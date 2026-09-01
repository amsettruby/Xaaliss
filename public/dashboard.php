<?php
    include "../config/config.php";
    include_once "../includes/fonction.php";

    if(session_status() === PHP_SESSION_NONE) session_start();
    $id = $_SESSION['id'] ?? null;
    $nodebt = false;
    $nocreance = false;

    if($id == null) {
        header("Location: connexion.php");
        exit;
    } else {
        $sql = "SELECT nom, prenom FROM utilisateurs WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        $prenom = $user['prenom'];
        $nom = $user['nom'];

        $dettesql = "SELECT * FROM dettes WHERE userID = :userId";
        $detteprepare = $pdo->prepare($dettesql);
        $detteprepare->execute(['userId' => $id]);
        $debtData = $detteprepare->fetchAll(PDO::FETCH_ASSOC);
        if(count($debtData) == 0) {
            $nodebt = true;
        };

        $totalDebt = 0;

        foreach($debtData as $debt) {
            $totalDebt += $debt['montant'];
        }

        $creancesql = "SELECT * FROM creances WHERE userID = :userId";
        $creanceprepare = $pdo->prepare($creancesql);
        $creanceprepare->execute(['userId' => $id]);
        $creanceData = $creanceprepare->fetchAll(PDO::FETCH_ASSOC);
        if(count($creanceData) == 0) {
            $nocreance = true;
        };
        
        $totalCreance = 0;

        foreach($creanceData as $creance) {
            $totalCreance += $creance['montant'];
        }
        
        $changeToCreance = false;
        $addCreance = false;
        $addDebt = false;
        // var_dump($_SERVER);
        $currentActive = 'dettes';

        if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['creances'])) {
            $changeToCreance = true;
            $currentActive = 'creances';
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add-creance'])) {

            if(isset($_POST['nom']) && isset($_POST['montant']) && !empty($_POST['nom']) && !empty($_POST['montant'])) {
                $nom = trim($_POST['nom']);
                $montant = $_POST['montant'];

                $chars = array_merge(
                    range('A', 'Z'),
                    range('a', 'z'),
                    range('0', '9')
                );

                $creanceId = "";

                for($i = 0; $i < 20; $i++) {
                    $n = rand(0, 61);
                    $creanceId .= $chars[$n];
                }

                $sql = "INSERT INTO creances (id, userID, nom, montant) VALUES (:id, :userID, :nom, :montant)";
                $stmt = $pdo->prepare($sql);

                $success = $stmt->execute([
                    'id'      => $creanceId,
                    'userID'  => $id,
                    'nom'     => $nom,
                    'montant' => $montant
                ]);

                if($success) {
                    header('Location: dashboard.php?creances=Creances');
                }
            }
            // $currentActive = 'creances';
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add-dette'])) {

            if(isset($_POST['nom']) && isset($_POST['montant']) && !empty($_POST['nom']) && !empty($_POST['montant'])) {
                $nom = trim($_POST['nom']);
                $montant = $_POST['montant'];

                $chars = array_merge(
                    range('A', 'Z'),
                    range('a', 'z'),
                    range('0', '9')
                );

                $detteId = "";

                for($i = 0; $i < 20; $i++) {
                    $n = rand(0, 61);
                    $detteId .= $chars[$n];
                }

                $sql = "INSERT INTO dettes (id, userID, nom, montant) VALUES (:id, :userID, :nom, :montant)";
                $stmt = $pdo->prepare($sql);

                $success = $stmt->execute([
                    'id'      => $detteId,
                    'userID'  => $id,
                    'nom'     => $nom,
                    'montant' => $montant
                ]);

                if($success) {
                    header('Location: dashboard.php?dettes=Dettes');
                }
            }
            // $currentActive = 'dettes';
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajouter-dette'])) {
            $addDebt = true;
            $currentActive = 'dettes';
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajouter-creance'])) {
            $addCreance = true;
            $currentActive = 'creances';
        }

        include_once '../public/index.php';
    }
?>