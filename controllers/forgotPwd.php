<?php
session_start();
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../config.php';
$response = array();
$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $codeVerif = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE user SET codeVerif='{$codeVerif}' WHERE email='{$email}'");

        if ($query) {
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'credit.salafin@gmail.com';
                $mail->Password = 'bjeszncwbliclctl';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom('credit.salafin@gmail.com', 'SALAFIN');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'no reply';
                $mail->Body = 'Voici le lien de vérification : <b><a href="http://localhost/SALAFINlp/changePwd.php?reset='.$codeVerif.'">http://localhost/SALAFINlp/changePwd.php?reset='.$codeVerif.'</a></b>';

                $mail->send();

                $response['success'] = true;
                $response['message'] = "Nous avons envoyé un lien de vérification à votre adresse e-mail.";
            } catch (Exception $e) {
                $response['success'] = false;
                $response['message'] = "Impossible d’envoyer le message. Erreur d’envoi : {$mail->ErrorInfo}";
            }
        }
    } else {
        $response['success'] = false;
        $response['message'] = "{$email} - Une adresse e-mail non trouvée.";
    }
}else{
    $response['message'] = "This command was not found.";
    echo json_encode($response);
    exit;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
