<?php
    include "../config/config.php";

    if(session_status() === PHP_SESSION_NONE) session_start();
    $id = $_SESSION['id'] ?? null;
    $nodebt = false;
    $nocreance = false;

    if($id == null) {
        header("Location: connexion.php");
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

        include '../public/index.php';
    }
?>