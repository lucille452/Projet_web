<?php

// Inclure l'autoloader de Composer
require '../PHPMailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Paramètres du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lucille.cenac@gmail.com'; // Votre adresse Gmail
    $mail->Password = '';     // Votre mot de passe Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // erreurs détaillées
    $mail->SMTPDebug = 2; // Niveau de débogage 2 pour les informations détaillées
    $mail->Debugoutput = 'html'; // Format de sortie du débogage

    // Destinataires
    $mail->setFrom('lucille.cenac@gmail.com', 'CENAC Lucille');
    $mail->addAddress('lucenacfam@gmail.com', 'Lucille CENAC');

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Sujet de l\'email';
    $mail->Body    = 'Contenu de l\'email';

    // Envoyer l'email
    $mail->send();
    echo 'L\'email a été envoyé avec succès.';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
}