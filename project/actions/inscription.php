<?php 
    include "../config/config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inscription'])) {
        $emptyfield = true;
        $passWdMisMatch = true;

        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $passwd = $_POST['passwd'];
        $passwdconfirm = $_POST['passwd-confirm'];
        $mail = trim($_POST['mail']);

        if(!empty($nom) && !empty($prenom) && !empty($passwd) && !empty($mail) && !empty($passwd) && !empty($passwdconfirm)) {
            $emptyfield = false;
            if($passwd === $passwdconfirm) {
                $passWdMisMatch = false;
                $_hashedPasswd = password_hash($passwd, PASSWORD_DEFAULT);
                $chars = array_merge(
                    range('A', 'Z'),
                    range('a', 'z'),
                    range('0', '9')
                );

                $userId = "";

                for($i = 0; $i < 20; $i++) {
                    $n = rand(0, 61);
                    $userId .= $chars[$n];
                }

                $date = new DateTime();
                $timestamp = $date->getTimestamp();
    
                $sql = "INSERT INTO utilisateurs (id, nom, prenom, email, passwd, createdAt) VALUES (:id, :nom, :prenom, :mail, :mot_de_passe, :timestmp)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $userId);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':timestmp', $timestamp);
                $stmt->bindParam(':mot_de_passe', $_hashedPasswd);
                $inscription =$stmt->execute();
        
                if ($inscription) {
                    if(session_status() === PHP_SESSION_NONE) session_start();
                    $_SESSION['success'] = "Inscription reussie !";
                    header('Location: ../public/connexion.php');
                    exit;
                }
            } else {
                $passWdMisMatch = true;
            }
        } else {
            $emptyfield = true;
        }
    }