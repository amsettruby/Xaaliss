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
    <!-- <div class="modal">
        <div class="modalTitle">
            <h2 class="main-text" style="font-size: 1.3rem">Ajouter une dette</h2>
            <div class="cross">
                <i class="bi bi-x secondary-text"></i>
            </div>
        </div>
        <section class="modal-actions">
            <div class="modal-actions-group">
                <div class="modal-dettes">Dettes</div>
                <div class="modal-creance" >Créances</div>
            </div>
        </section>
        <section class="modal-user">
            <div class="input-group">
                <label for="name">Nom de la personne</label>
                <div class="input-field name">
                    <i class="bi bi-person" style="margin: 10px"></i>
                    <input type="text" name="nom" id="name" placeholder="Entrez le nom de la personne" class="secondary-text">
                </div>
            </div>
            <div class="input-group">
                <label for="amount">Montant</label>
                <div class="input-field amount">
                    <i class="bi bi-cash" style="margin: 10px"></i>
                    <input type="text" name="montant" id="amount" placeholder="Entrez le montant" class="secondary-text">
                </div>
            </div>
        </section>
        <div class="controls">
            <div class="cancel secondary-text">
                <input type="submit" value="Annuler" name="cancel_add">   
            </div>
            <div class="submit">
                <input type="submit" value="Ajouter" name="add" style="color: black">
            </div>
        </div>
    </div> -->
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
                <div class="dettes">Dettes</div>
                <div class="creance">Créances</div>
            </div>
            <div class="add">
                <input type="submit" value="Ajouter" name="ajouter-dette" style="color: black; font-weight: bolder">
            </div>
        </section>

        <?php

            if(isset($debtData) && $nodebt == false) {
                echo '<section class="data">';
                echo '<section class="data-group">';
                foreach($debtData as $debt) {
                    echo '<div class="user">';
                    echo '<div class="initials main-text" style="font-size: 12px">';
                    echo '<div class="initials main-text" style="font-size: 12px"><i class="bi bi-person"></i></div>';
                    echo '<div class="fullname main-text" style="font-size: 12px">';
                    echo $debt['nom'];
                    echo '/div>';
                    echo '<div class="montant main-text" style="font-size: 12px">';
                    echo $debt['montant'];
                    echo '</div>';
                    echo '<div class="edit bg-grey"><i class="bi bi-pencil secondary-text" style="font-size: 14px"></i></div>';
                    echo '<div class="delete bg-grey"><i class="bi bi-trash secondary-text" style="font-size: 14px"></i></div>';
                    echo '</div>';
                }
                echo '</section>';
                echo '</section>';

            }

        ?>
        <!-- <section class="data">
            <section class="data-group">
                <div class="user">
                    <div class="initials main-text" style="font-size: 12px"><i class="bi bi-person"></i></div>
                    <div class="fullname main-text" style="font-size: 12px">Boubacar Diallo<
                    <div class="montant main-text" style="font-size: 12px">500F</div>
                    <div class="edit bg-grey"><i class="bi bi-pencil secondary-text" style="font-size: 14px"></i></div>
                    <div class="delete bg-grey"><i class="bi bi-trash secondary-text" style="font-size: 14px"></i></div>
                </div>
                <div class="user">
                    <div class="initials main-text reduced-font" style="font-size: 12px">BD</div>
                    <div class="fullname main-text" style="font-size: 12px">Boubacar Diallo</div>
                    <div class="montant main-text" style="font-size: 12px">500F</div>
                    <div class="edit bg-grey"><i class="bi bi-pencil secondary-text" style="font-size: 14px"></i></div>
                    <div class="delete bg-grey"><i class="bi bi-trash secondary-text" style="font-size: 14px"></i></div>
                </div>
            </section>
        </section> -->
    </section>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>