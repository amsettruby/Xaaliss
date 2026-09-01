<?php
    require_once '../includes/fonction.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">   
</head>
<body>
    <!-- <div class="disconnect">
        <h3 style="font-size: 16px">Voulez-vous vraiment vous deconnecter ?</h3>
        <div class="buttons">
            <div class="no">
                <input type="submit" value="Non" name="cancel_disconnect">
            </div>
            <div class="yes">
                <input type="submit" value="Oui" name="disconnect" style="color: black">
            </div>
        </div>
    </div> -->
    <?php
        if(isset($addCreance) && $addCreance === true) {
            // header("Location: dashboard.php?creances=Creances");
            addCreances();
            // exit;
        }

        if($addDebt) {
            addDebts();
            // header("Location: dashboard.php");
            // exit;
        }
    ?>

    <!-- <div class="edited" id="edited">
        <div class="check">
            <i class="bi bi-check-circle" style="font-size: 12px; color: #3ADD8E"></i>
        </div>
        <div class="text">
            <h4 class="main-text">Dette modifiée</h4>
            <span class="secondary-text">Les changements ont été enregistrés.</span>
        </div>
    </div> -->
    <!-- <div class="deleted">
        <div class="trash">
            <i class="bi bi-trash" style="font-size: 13px; color: #FF6B5B"></i>
        </div>
        <div class="text">
            <h4 class="main-text">Dette modifiée</h4>
            <span class="secondary-text">Les changements ont été enregistrés.</span>
        </div>
    </div> -->
    <section class="main">
        <section class="userinfo">
            <div class="users">
                <div class="logo main-text">
                    <?php echo substr($nom, 0, 1) . substr($prenom, 0, 1);
                    ?>
                    .
                </div>
                <div class="username">
                    <hgroup>
                        <h2 class="main-text">
                            <?php
                                echo $prenom . ' ' . $nom
                            ?>
                        </h2>
                        <span class="secondary-text">Tableau de board</span>
                    </hgroup>
                </div>
            </div>
            <div class="logout">
                <i class="bi bi-box-arrow-right secondary-text"></i>
            </div>
        </section>

        <section class="summary">
            <div class="debt-summary">
                <div class="icons">
                    <div class="wallet-red">
                        <i class="bi bi-wallet" style="color: #FF6B5B"></i>
                    </div>
                    <div class="arrow-up">
                        <i class="bi bi-arrow-up-short" style="color: #FF6B5B"></i>
                    </div>
                </div>
                <div class="amount">
                    <span class="secondary-text">Total à payer</span>
                    <h3 class="main-text">
                        <?php
                            echo $totalDebt . ' F'
                        ?>
                    </h3>
                </div>
            </div>

            <div class="creance-summary">
                <div class="icons">
                    <div class="wallet-green">
                        <i class="bi bi-wallet"></i>
                    </div>
                    <div class="arrow-down">
                        <i class="bi bi-arrow-down-short" style="color: #3add8e"></i>
                    </div>
                </div>
                <div class="amount">
                    <span class="secondary-text">Total à recevoir</span>
                    <h3 class="main-text">
                        <?php
                            echo $totalCreance . ' F'
                        ?>
                    </h3>
                </div>
            </div>
        </section>

        <section class="actions">
            <div class="actions-group">
                <div class="dettes">
                    <form action="dashboard.php" method="get" style="height: 100%; width: 100%">
                        <input type="submit" value="Dettes" name='dettes'>
                    </form>
                </div>
                <div class="creance">
                    <form action="dashboard.php" method="get" style="height: 100%; width: 100%">
                        <input type="submit" value="Creances" name='creances' id="creance">
                    </form>
                </div>
            </div>
            <div class="add">
                <form action="dashboard.php" method="POST" style="height: 100%; width: 100%">
                    <input type="submit" value="Ajouter" name="ajouter-dette" style="color: black; font-weight: bolder" id='ajouter'>
                </form>
            </div>
        </section>

        <?php

            if($changeToCreance) {
                changeToCreances($creanceData, $nocreance);
            }

            if(isset($currentActive) && $currentActive == 'dettes') {
                if(isset($debtData) && $nodebt == false) {
                    echo '<section class="data" id="data">';
                    echo '<section class="data-group">';
                    foreach($debtData as $debt) {
                        echo '<div class="user" id="' . $debt['id'] .'">
                        <div class="initials main-text" style="font-size: 12px"><i class="bi bi-person"></i></div>
                        <div class="fullname main-text" style="font-size: 12px">'.$debt['nom'].'</div>
                        <div class="montant main-text" style="font-size: 12px">'.$debt['montant'].' F</div>
                        <div class="edit bg-grey"><i class="bi bi-pencil secondary-text" style="font-size: 14px"></i></div>
                        <div class="delete bg-grey"><i class="bi bi-trash secondary-text" style="font-size: 14px"></i></div>
                    </div>';      
                    }
                    echo '</section>';
                    echo '</section>';
                } else {
                    echo '<section class="data">
                    <section class="data-group">
                        Aucune Dette. Enregistrez en une.
                    </section>
                </section>';
                }
            } else if(isset($currentActive) && $currentActive == 'creances') {
                if(isset($creanceData) && $nocreance == false) {
                    echo '<section class="data" id="data">';
                    echo '<section class="data-group">';
                    foreach($creanceData as $creance) {
                        echo $creance['id'];
                        echo '<div class="user" id="' . $creance['id'] .'">
                                <div class="initials main-text" style="font-size: 12px">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="fullname main-text" style="font-size: 12px">'
                                    . $creance['nom'] . 
                                '</div>
                                <div class="montant main-text" style="font-size: 12px"> ' 
                                    .$creance['montant'] .
                                ' F</div>
                                <div class="edit bg-grey">
                                    <i class="bi bi-pencil secondary-text" style="font-size: 14px"></i>
                                </div>
                                <div class="delete bg-grey">
                                    <i class="bi bi-trash secondary-text" style="font-size: 14px"></i>
                                </div>
                            </div>';      
                    }
                    echo '</section>';
                    echo '</section>';
                }
            }
        ?>
    </section>
    <script defer src="../assets/js/dashboard.js"></script>
</body>
</html>