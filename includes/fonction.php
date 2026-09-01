<?php
// include '../public/dashboard.php';

function changeToCreances($creanceData, $nocreance) {
        if(isset($creanceData) && $nocreance == false) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                const sectionDebt = document.getElementById('data')
                sectionDebt.remove()
                const add = document.getElementById('ajouter');
                add.name = 'ajouter-creance';
            })
            </script>";
                echo '<section class="data">';
                echo '<section class="data-group">';
                foreach($creanceData as $creance) {
                    echo '<div class="user" id="' . $creance['id'] .'">
                    <div class="initials main-text" style="font-size: 12px"><i class="bi bi-person"></i></div>
                    <div class="fullname main-text" style="font-size: 12px">'.$creance['nom'].'</div>
                    <div class="montant main-text" style="font-size: 12px">'.$creance['montant'].' F</div>
                    <div class="edit bg-grey"><i class="bi bi-pencil secondary-text" style="font-size: 14px"></i></div>
                    <div class="delete bg-grey"><i class="bi bi-trash secondary-text" style="font-size: 14px"></i></div>
                </div>';      
                }
                echo '</section>';
                echo '';

        } else {
            echo '<section class="data">
                    <section class="data-group">
                        Aucune Creance. Enregistrez en une.
                    </section>
                </section>';
            echo '';
        }
}

    function addDebts() {
            echo '<div class="modal" id="modal">
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
                ';

                echo "<script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const close = document.getElementById('close');
                            // console.log(close);
                            if(close) {
                                close.addEventListener('click', function () {
                                    const modal = document.getElementById('modal');
                                    modal.remove();
                                    window.location.href = 'dashboard.php';
                                })
                            }

                            const cancelBtn = document.getElementById('cancel');
                            cancelBtn.addEventListener('click', function () {
                                const modal = document.getElementById('modal');
                                modal.remove()
                                window.location.href = 'dashboard.php';
                            })
                        })
                    </script>";
}

        
function addCreances() {
            echo '<div class="modal" id="modal">
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
                            <div class="controls">
                                <div class="cancel secondary-text" id="cancel">
                                    Annuler   
                                </div>
                                <div class="submit">
                                    <input type="submit" value="Ajouter" name="add-creance" style="color: black">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>';

                echo "<script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const close = document.getElementById('close');
                            if(close) {
                                close.addEventListener('click', function () {
                                    const modal = document.getElementById('modal');
                                    modal.remove();
                                    window.location.href = 'dashboard.php?creances=Creances';
                                })
                            }

                            const cancelBtn = document.getElementById('cancel');
                            cancelBtn.addEventListener('click', function () {
                                const modal = document.getElementById('modal');
                                modal.remove()
                                window.location.href = 'dashboard.php';
                            })
                        })
                    </script>";
}