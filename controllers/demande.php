<?php
session_start();
require_once "../config.php";
// Initialize the response array
$response = array();

// Vérifier si la requête est bien une requête POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Decode the JSON data sent in the request body
    $formData = json_decode(file_get_contents('php://input'), true);

    // Get the data from the decoded JSON
    $creditType = $formData["creditType"];
    $montant = $formData["montant"];
    $duree = $formData["duree"];
    $offerMonthly = $formData["offerMonthly"];

    $_SESSION['creditType'] = $creditType;
    $_SESSION['montant'] = $montant;
    $_SESSION['duree'] = $duree;
    $_SESSION['offerMonthly'] = $offerMonthly;

    // For demonstration purposes, let's just print the retrieved data.
    echo "Credit Type: " . $_SESSION['creditType'] . "<br>";
    echo "Montant: " . $_SESSION['montant'] . " DH<br>";
    echo "Durée: " . $_SESSION['duree'] . " mois<br>";
    echo "Mensualité: " . $_SESSION['offerMonthly'] . " DH<br>";

    // Store the data in the response array
    $response['creditType'] = $_SESSION['creditType'];
    $response['montant'] = $_SESSION['montant'];
    $response['duree'] = $_SESSION['duree'];
    $response['offerMonthly'] = $_SESSION['offerMonthly'];
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
