<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require_once "../config.php";
// Initialize the response array
$response = array();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['creditType'], $_SESSION['montant'], $_SESSION['duree'], $_SESSION['offerMonthly'])) {
    $creditType = $_SESSION['creditType'];
    $montant = $_SESSION['montant'];
    $duree = $_SESSION['duree'];
    $offerMonthly = $_SESSION['offerMonthly'];

    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $cin = $_POST["cin"];
    $tel = $_POST["tel"];
    $mail = $_POST["mail"];
    $pwd = $_POST["pwd"];
    $ville = $_POST["ville"];
    $dob = $_POST["dob"];
    $code = $_POST["code"];
    $adresse = $_POST["adresse"];
    $profession = $_POST["profession"];
    $secActivite = isset($_POST["secActivite"]) ? $_POST["secActivite"] : "NULL"; // Handle the case when secActivite is not set
    $salaire = $_POST["salaire"];
    $dow = $_POST["dow"];

    $_SESSION['cin'] = $cin;
    $response['cin'] = $_SESSION['cin'];

    // Check if the CIN already exists in the database
    $query = "SELECT COUNT(*) AS count FROM user WHERE cin = '$cin'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $cinExists = $row['count'] > 0;

    // Check if the email already exists in the database
    $queryEmail = "SELECT COUNT(*) AS countEmail FROM user WHERE email = '$mail'";
    $resultEmail = mysqli_query($conn, $queryEmail);
    $rowEmail = mysqli_fetch_assoc($resultEmail);
    $emailExists = $rowEmail['countEmail'] > 0;

    // Enregistrer les données dans la base de données
    try {
        if ($cinExists) {
            // CIN already exists, return an error message
            $response['cinExists'] = true;
            $response['success'] = false;
            $response['message'] = "Le CIN est déjà utilisé.";
        } else if ($emailExists) {
            // Email already exists, return an error message
            $response['emailExists'] = true;
            $response['success'] = false;
            $response['message'] = "L'adresse e-mail est déjà utilisée.";
        } else {
            $response['cinExists'] = false;
            $codeVerif = generateCode(); // Generate a verification code (you can implement this function)

            // Insérer les informations de l'utilisateur dans la table "user"
            $sql = "INSERT INTO user (cin, nom, prenom, email, pwd, ville, adresse, codePostal, phone, dob, codeVerif) 
                VALUES ('$cin', '$nom', '$prenom', '$mail', '$pwd', '$ville', '$adresse', '$code', '$tel', '$dob', '$codeVerif')";
            mysqli_query($conn, $sql);
            // Insérer les informations professionnelles dans la table "profession"
            $sql = "INSERT INTO profession (cin, fonction, secActivite, revenu, dow) 
                VALUES ('$cin', '$profession', '$secActivite', '$salaire', '$dow')";
            mysqli_query($conn, $sql);

            $sql = "INSERT INTO demande (cin, montant, typeCredit, duree, statut) 
                    VALUES ('$cin', '$montant', '$creditType', '$duree', 'En attente')";
            mysqli_query($conn, $sql);

            // Valider la transaction
            mysqli_commit($conn);

            // Send the verification email
            
            $subject = "Email Verification";
            $message = 'Here is the verification link <b><a href="http://localhost/SALAFINlp/login.php?codeVerif='.$codeVerif.'">http://localhost/SALAFINlp/login.php?codeVerif='.$codeVerif.'</a></b> '; 

            // Save the verification code in the session or database for further verification
            $_SESSION['codeVerif'] = $codeVerif;
            
            sendVerificationEmail($mail, $subject, $message);
            // Si tout s'est bien passé, vous pouvez renvoyer un message de succès
            $successMessage = "Les informations ont été enregistrées avec succès !";
            $response['success'] = true;
            $response['message'] = $successMessage;
        }
    } catch (Exception $e) {
        // Gérer les erreurs en cas de problème avec la base de données
        $errorMessage = "Erreur : " . $e->getMessage();
        $response['success'] = false;   
        $response['message'] = $errorMessage;
    }
}

function sendVerificationEmail($to, $subject, $message)
{
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

        // Recipients
        $mail->setFrom('credit.salafin@gmail.com', 'SALAFIN');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
    } catch (Exception $e) {
        throw new Exception("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
function generateCode() {
    $codemail = md5(rand());
    return $codemail;
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
