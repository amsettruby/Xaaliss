<?php
include_once __DIR__ . "/../config/config.php";

/** @var PDO  $pdo */

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['valider'])){
    if(!empty($_POST['passwd']) && !empty($_POST['passwd-chk']) && $_POST['passwd'] === $_POST['passwd-chk']){
        $newPasswd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        $token = $_GET['token'];

        $sql = "SELECT * FROM reset WHERE token = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $data = null;
        $resetData = $stmt->fetch(PDO::FETCH_ASSOC);

        if($resetData && time() < $resetData['expiry']){
            $sql = "UPDATE utilisateurs SET passwd = :newPasswd WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $resetData['mail']);
            $stmt->bindParam(':newPasswd', $newPasswd);
            $stmt->execute();;

            if($stmt->execute()){
                session_start();
                $_SESSION['done'] = true;
                $removeTkSql = "DELETE FROM reset WHERE token = :token";
                $stmt = $pdo->prepare($removeTkSql);
                $stmt->bindParam(':token', $token);
                $stmt->execute();
                if($stmt->execute()){
                    header('Location: ../public/resetlink.php');
                    exit;
                }
            }
        }
    }
}