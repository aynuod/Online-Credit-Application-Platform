<?php
include 'config.php';
error_log("Inserting data into demandes table");

// Initialize variables with actual values
$user_cin = "5"; // Example user CIN
$type = "Crédit auto"; // Example type
$montant = 20000; // Example montant
$duree = 6; // Example duree

// Simulated selected options for demonstration
$selectedOptions = [
    'question1' => 'Crédit Personnel',
    'question2' => 'option2',
    'question3' => 'option1',
    'question4' => 'Études'
];

// Insérer les données dans la table demandes
$sql = "INSERT INTO demandes (user_cin, type, montant, duree, statut, date_soumission) 
        VALUES ('$user_cin', '$type', '$montant', '$duree', 'en attente', NOW())";

if ($conn->query($sql) === TRUE) {
    $demande_id = $conn->insert_id; // Récupérer l'ID de la demande nouvellement insérée
    
    // Insérer les autres données spécifiques à la demande, comme les réponses aux questions
    $question1_response = $selectedOptions['question1'];
    $question2_response = $selectedOptions['question2'];
    $question3_response = $selectedOptions['question3'];
    $question4_response = $selectedOptions['question4'];

    $insert_responses_sql = "INSERT INTO demande_responses (demande_id, question1_response, question2_response, question3_response, question4_response)
                            VALUES ('$demande_id', '$question1_response', '$question2_response', '$question3_response', '$question4_response')";

    if ($conn->query($insert_responses_sql) === TRUE) {
        echo "La demande a été enregistrée avec succès.";
    } else {
        echo "Erreur : " . $insert_responses_sql . "<br>" . $conn->error;
    }
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
