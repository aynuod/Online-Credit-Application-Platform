<?php
$host = 'localhost';
$db = 'salafin';
$user = 'root';
$password = '';

$connection = mysqli_connect($host, $user, $password, $db);

// Vérifier la connexion à la base de données
if (!$connection) {
    die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
}
?>

