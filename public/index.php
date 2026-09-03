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
    <div class="dette-modal" id="dette-modal">
        <div class="modalTitle">
            <h2 class="main-text" style="font-size: 1.3rem">Ajouter une dette</h2>
            <div class="cross" id="close">
                <i class="bi bi-x secondary-text"></i>
            </div>
        </div>
        <section class="modal-user">
            <form action="dashboard.php" method="POST" style="height: 100%; width: 100%">
                <div class="input-group">
                    <label for="name">Nom de la personne</label>
                    <div class="input-field name">
                        <i class="bi bi-person" style="margin: 10px"></i>
                        <input type="text" name="nom" id="name" placeholder="Entrez le nom de la personne" class="secondary-text" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="amount">Montant</label>
                    <div class="input-field amount">
                        <i class="bi bi-cash" style="margin: 10px"></i>
                        <input type="number" name="montant" id="amount" placeholder="Entrez le montant" class="secondary-text" required>
                    </div>  
                </div>
                <div class="controls">
                    <div class="cancel secondary-text" id="cancel">
                        <input type="submit" value="Annuler" name="cancel_add">   
                    </div>
                    <div class="submit">
                        <input type="submit" value="Ajouter" name="add-dette" style="color: black">
                    </div>
                </div>
            </form>
        </section>
    </div>
    
    <div class="creance-modal" id="creance-modal">
            <div class="modalTitle">
                <h2 class="main-text" style="font-size: 1.3rem">Ajouter une creance</h2>
                <div class="cross" id="close">
                    <i class="bi bi-x secondary-text"></i>
                </div>
            </div>
            <section class="modal-user">
                <form action="dashboard.php" method="POST" style="height: 100%; width: 100%">
                    <div class="input-group">
                        <label for="name">Nom de la personne</label>
                        <div class="input-field name">
                            <i class="bi bi-person" style="margin: 10px"></i>
                            <input type="text" name="nom" id="name" placeholder="Entrez le nom de la personne" class="secondary-text" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="amount">Montant</label>
                        <div class="input-field amount">
                            <i class="bi bi-cash" style="margin: 10px"></i>
                            <input type="number" name="montant" id="amount" placeholder="Entrez le montant" class="secondary-text" required>
                        </div>  
                    </div>
                    <div class="controls">
                        <div class="cancel secondary-text" id="cancel">
                            Annuler   
                        </div>
                        <div class="submit" style="background-color: #3add8e">
                            <input type="submit" value="Ajouter" name="add-creance" style="color: black">
                        </div>
                    </div>
                </form>
            </section>
        </div>

    <div class="disconnect" id='disconnect-modal'>
        <h3 style="font-size: 16px">Voulez-vous vraiment vous deconnecter ?</h3>
        <div class="buttons">
            <div class="no" id="non" style="text-align: center; align-content: center">
                Non
            </div>
            <div class="yes">
                <form action="../actions/logout.php" method="POST" style="width: 100%; height: 100%">    
                    <input type="submit" value="Oui" name="disconnect" style="color: black">
                </form>
            </div>
        </div>
    </div>

    <div class="delete-dette" id='delete-dettes'>
        <h3 style="font-size: 16px">Voulez-vous supprimer cette dette ?</h3>
        <div class="buttons">
            <div class="no" id="non" style="text-align: center; align-content: center">
                Non
            </div>
            <div class="yes">
                <form action="dashboard.php" method="POST" style="width: 100%; height: 100%">   
                    <input type="text" name="id" id="dette-id" hidden> 
                    <input type="submit" value="Oui" name="delete-dette" style="color: black" id="confirm-delete">
                </form>
            </div>
        </div>
    </div>

    <div class="delete-dette" id='delete-creances'>
        <h3 style="font-size: 16px">Voulez-vous supprimer cette dette ?</h3>
        <div class="buttons">
            <div class="no" id="non" style="text-align: center; align-content: center">
                Non
            </div>
            <div class="yes">
                <form action="dashboard.php" method="POST" style="width: 100%; height: 100%">   
                    <input type="text" name="id" id="creance-id" hidden> 
                    <input type="submit" value="Oui" name="delete-creance" style="color: black" id="confirm-delete">
                </form>
            </div>
        </div>
    </div>

    <div class="edit-modal" id="edit-modal">
        <div class="modalTitle">
            <h2 class="main-text" style="font-size: 1.3rem">Ajouter une creance</h2>
            <div class="cross" id="close">
                <i class="bi bi-x secondary-text"></i>
            </div>
        </div>

        <section class="modal-user">
            <form action="dashboard.php" method="POST" style="height: 100%; width: 100%">
                <div class="input-group">
                    <label for="name">Nom de la personne</label>
                    <div class="input-field name">
                        <i class="bi bi-person" style="margin: 10px"></i>
                        <input type="text" name="nom" id="name" placeholder="Entrez le nom de la personne" class="secondary-text" required>
                    </div>
                </div>
                <input type="text" name="id" id="id" class="secondary-text" hidden>
                <div class="input-group">
                    <label for="amount">Montant</label>
                    <div class="input-field amount">
                        <i class="bi bi-cash" style="margin: 10px"></i>
                        <input type="number" name="montant" id="amount" placeholder="Entrez le montant" class="secondary-text" required>
                    </div>  
                </div>
                <div class="controls">
                    <div class="cancel secondary-text" id="cancel">
                        Annuler   
                    </div>
                    <div class="submit" style="background-color: #3add8e" id="div">
                        <input type="submit" value="Modifier" style="color: black" id="ajouter">
                    </div>
                </div>
            </form>
        </section>
    </div>

    <?php
        if(isset($addedCreance) && $addedCreance) {
            echo '
                <div class="added" id="added">
                    <div class="check">
                        <i class="bi bi-check-circle" style="font-size: 12px; color: #3ADD8E"></i>
                    </div>
                    <div class="text">
                        <h4 class="main-text">Creance ajoutée avec succès</h4>
                    </div>
                </div>
            ';
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
                    <?php echo substr($prenom, 0, 1) . substr($nom, 0, 1);
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
            <div class="logout" id="logout">
                <i class="bi bi-box-arrow-right" id="disconnect"></i>
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

        <?php
            if(isset($_SESSION['currentActive']) && $_SESSION['currentActive'] == 'dettes') {
                echo '<section class="actions">
                        <div class="actions-group">
                            <div class="dettes active">
                                <form action="dashboard.php" method="get" style="height: 100%; width: 100%" id="dettes">
                                    <input type="submit" value="Dettes" name="dettes">
                                </form>
                            </div>
                            <div class="creance">
                                <form action="dashboard.php" method="get" style="height: 100%; width: 100%" id="creances">
                                    <input type="submit" value="Creances" name="creances" id="creance">
                                </form>
                            </div>
                        </div>
                        <div class="add" id="ajouter-dette">
                            Ajouter
                        </div>
                    </section>';
            } else {
                echo '<section class="actions">
                        <div class="actions-group">
                            <div class="dettes">
                                <form action="dashboard.php" method="get" style="height: 100%; width: 100%" id="dettes">
                                    <input type="submit" value="Dettes" name="dettes">
                                </form>
                            </div>
                            <div class="creance active">
                                <form action="dashboard.php" method="get" style="height: 100%; width: 100%" id="creances">
                                    <input type="submit" value="Creances" name="creances" id="creance">
                                </form>
                            </div>
                        </div>
                        <div class="add" id="ajouter-creance">
                            Ajouter
                        </div>
                    </section>';
            };
        ?>
        

        <?php
            if($changeToCreance) {
                changeToCreances($creanceData, $nocreance);
            }

            if(isset($_SESSION['currentActive']) && $_SESSION['currentActive'] == 'dettes') {
                if(isset($debtData) && $nodebt == false) {
                    echo '<section class="data" id="data">';
                    echo '<section class="data-group">';
                    foreach($debtData as $debt) {
                        echo '<div class="user" id="' . $debt['id'] .'">
                        <div class="initials main-text" style="font-size: 12px"><i class="bi bi-person"></i></div>
                        <div class="fullname main-text" style="font-size: 12px">'.$debt['nom'].'</div>
                        <div class="montant main-text" style="font-size: 12px">'.$debt['montant'].' F</div>
                        <div class="edit bg-grey" id="edit-dette"><i class="bi bi-pencil secondary-text" style="font-size: 14px"></i></div>
                        <div class="delete bg-grey" id="delete-dette"><i class="bi bi-trash secondary-text" style="font-size: 14px"></i></div>
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
            } else if(isset($_SESSION['currentActive']) && $_SESSION['currentActive'] == 'creances') {
                if(isset($creanceData) && $nocreance == false) {
                    echo '<section class="data" id="data">';
                    echo '<section class="data-group">';
                    foreach($creanceData as $creance) {
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
                                <div class="edit bg-grey" id="edit-creance">
                                    <i class="bi bi-pencil secondary-text" style="font-size: 14px"></i>
                                </div>
                                <div class="delete bg-grey" id="delete-creance">
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