<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selectedOptions']) && is_array($_POST['selectedOptions'])) {
        // Mettre à jour les données de session avec les options sélectionnées
        $_SESSION['selectedOptions'] = $_POST['selectedOptions'];

        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => "Invalid data"));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Invalid request method"));
}
?>
