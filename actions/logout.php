<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['disconnect'])) {
    session_destroy();
    header('Location: ../public/connexion.php');
    exit;
}
