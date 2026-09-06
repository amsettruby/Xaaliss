<?php
    require_once __DIR__ . '/../config/config.php';
/** @var PDO $pdo */

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = trim($_POST['mail']);
        $passwd = $_POST['passwd'];

        $sql = "SELECT * FROM utilisateurs WHERE email = :mail";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if($utilisateur && password_verify($passwd, $utilisateur['passwd'])) {
            session_regenerate_id(true);
            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["id"] = $utilisateur['id'];
            // $_SESSION['disconnect'] = false;
            header("Location: ../public/dashboard.php");
        } else {
            if(session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['error'] = true;
            header('Location: ../public/connexion.php');
        }
        exit();
    }