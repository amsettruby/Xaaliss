<?php
include __DIR__ . "/../includes/fonction.php";
include_once __DIR__ . "/../config/config.php";
require __DIR__ . '/../vendor/autoload.php';

/** @var PDO $pdo */

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['send-link'])){
    $token = generateToken();
    $expiry = time() + 1800;
    $sql = "INSERT INTO reset (mail, token, expiry) VALUES (:mail, :token, :expiry)";
    $preparedSql = $pdo->prepare($sql);
    $preparedSql->bindParam(':mail', $_POST['mail']);
    $preparedSql->bindParam(':token', $token);
    $preparedSql->bindParam(':expiry', $expiry);
    $preparedSql->execute();

    if($preparedSql->rowCount() > 0) {
        $resend = Resend::client('API_TOKEN_KEY');

        $result = $resend->emails->send([
            'from' => 'Acme <onboarding@resend.dev>',
            'to' => ['delivered@resend.dev'],
            'subject' => 'Reinitialisation mot de passe',
            'html' => 'Bonsoir <strong>Bailo</strong> <br><br>' .
                'Vous avez récemment fait une demande de réinitialisation de mot de passe pour votre compte sur la plateforme Xaaliss.<br>' .
                'Utilisez ce lien pour réinitialiser votre mot de passe. La durée de validité du lien est de 30 minutes.<br><br>' .
                '<a href="http://localhost/project/public/resetlink.php?token=' . urlencode($token) . '">Réinitialiser mon mot de passe</a><br><br>' .
                'Si la demande ne vient pas de vous, <strong>ignorez ce mail.</strong>',
        ]);

        if($result['id'] !== "") {
            $_SESSION['mailSent'] = true;
            header('Location: ../public/resetpasswd.php');
            exit;
        }

    }
}