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
        $stmt->fetch();

        if($stmt->rowCount() > 0 && time() < $stmt['expiry']){
            $sql = "UPDATE utilisateurs SET passwd = :newPasswd WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $stmt['email']);
            $stmt->bindParam(':newPasswd', $newPasswd);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $_SESSION['done'] = true;
            }
            header('Location: ../public/resetlink.php');
            exit;
        }
    }
}