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
            <div class="edit bg-grey" id="edit-creance"><i class="bi bi-pencil secondary-text" style="font-size: 14px"></i></div>
            <div class="delete bg-grey" id="delete-creance"><i class="bi bi-trash secondary-text" style="font-size: 14px"></i></div>
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
    echo '
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
    echo '';

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
                    window.location.href = 'dashboard.php?creances=Creances';
                })
            })
        </script>";
}