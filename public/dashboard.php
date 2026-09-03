<?php
    include "../config/config.php";
    include_once "../includes/fonction.php";
    include "../actions/logout.php";

    if (session_status() === PHP_SESSION_NONE) session_start();
    $id = $_SESSION['id'] ?? null;
    $nodebt = false;
    $nocreance = false;

    if ($id == null) {
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
        if (count($debtData) == 0) {
            $nodebt = true;
        };

        $totalDebt = 0;

        foreach ($debtData as $debt) {
            $totalDebt += $debt['montant'];
        }

        $creancesql = "SELECT * FROM creances WHERE userID = :userId";
        $creanceprepare = $pdo->prepare($creancesql);
        $creanceprepare->execute(['userId' => $id]);
        $creanceData = $creanceprepare->fetchAll(PDO::FETCH_ASSOC);
        if (count($creanceData) == 0) {
            $nocreance = true;
        };
        
        $totalCreance = 0;

        foreach ($creanceData as $creance) {
            $totalCreance += $creance['montant'];
        }
        
        $changeToCreance = false;
        $_SESSION['currentActive'] = 'dettes';
        $addedDebt = false;
        $addedCreance = false;

        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['creances'])) {
            $changeToCreance = true;
            $_SESSION['currentActive'] = 'creances';
        }
//AJOUTER UNE NOUVELLE CREANCE
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add-creance'])) {
            if (isset($_POST['nom']) && isset($_POST['montant']) && !empty($_POST['nom']) && !empty($_POST['montant'])) {
                $nom = trim($_POST['nom']);
                $montant = $_POST['montant'];

                $chars = array_merge(
                    range('A', 'Z'),
                    range('a', 'z'),
                    range('0', '9')
                );

                $creanceId = "";

                for ($i = 0; $i < 20; $i++) {
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

                if ($success) {
                    $addedCreance = true;
                    header('Location: dashboard.php?creances=Creances');
                }
            }
            // $currentActive = 'creances';
        }
//AJOUTER UNE NOUVELLE DETTE
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add-dette'])) {

            if (isset($_POST['nom']) && isset($_POST['montant']) && !empty($_POST['nom']) && !empty($_POST['montant'])) {
                $nom = trim($_POST['nom']);
                $montant = $_POST['montant'];

                $chars = array_merge(
                    range('A', 'Z'),
                    range('a', 'z'),
                    range('0', '9')
                );

                $detteId = "";

                for ($i = 0; $i < 20; $i++) {
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

                if ($success) {
                    $addedDebt = true;
                    header('Location: dashboard.php?dettes=Dettes');
                }
            }
            // $currentActive = 'dettes';
        }
//MODIFIER UNE CREANCE
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-creance'])) {
            if (!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['montant'])) {
                // La clause WHERE id = :id est essentielle pour ne cibler qu'une seule créance
                $updateSql = "UPDATE creances SET nom = :nom, montant = :montant WHERE id = :id";
                $updatePrepared = $pdo->prepare($updateSql);
                
                $updatePrepared->execute([
                    ':nom' => $_POST['nom'],
                    ':montant' => $_POST['montant'],
                    ':id' => $_POST['id']
                ]);

                header('Location: dashboard.php?creances=Creances');
                exit;
            }
        }
//MODIFIER UNE DETTE
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-dette'])) {
            if (!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['montant'])) {
                // La clause WHERE id = :id est essentielle pour ne cibler qu'une seule créance
                $updateSql = "UPDATE dettes SET nom = :nom, montant = :montant WHERE id = :id";
                $updatePrepared = $pdo->prepare($updateSql);
                
                $updatePrepared->execute([
                    ':nom' => $_POST['nom'],
                    ':montant' => $_POST['montant'],
                    ':id' => $_POST['id']
                ]);

                header('Location: dashboard.php?dettes=Dettes');
                exit;
            }
        }
//SUPPRIMER UNE DETTE
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete-dette'])) {

            if(!empty($_POST['id'])) {
                $sql = "DELETE FROM dettes WHERE id = :id";
                $deletePrepared = $pdo->prepare($sql);
                $deletePrepared->execute([
                    ':id' => $_POST['id'],
                ]);
                header('Location: dashboard.php?dettes=Dettes');
                exit;
            }
        }
//SUPPRIMER UNE CREANCE
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete-creance'])) {

            if(!empty($_POST['id'])) {
                $sql = "DELETE FROM creances WHERE id = :id";
                $deletePrepared = $pdo->prepare($sql);
                $deletePrepared->execute([
                    ':id' => $_POST['id'],
                ]);
                header('Location: dashboard.php?creances=Creances');
                exit;
            }
        }
        include_once '../public/index.php';
    }
?>