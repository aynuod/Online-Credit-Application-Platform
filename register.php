<?php

require_once "config.php";
echo "Query 1 executed successfully!";

// Vérifier si la requête est bien une requête POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $cin = $_POST["cin"];
    $tel = $_POST["tel"];
    $mail = $_POST["mail"];
    $pwd = $_POST["pwd"];
    $ville = $_POST["ville"];
    $dob = $_POST["dob"];
    $codePostal = $_POST["code"];
    $adresse = $_POST["adresse"];
    $profession = $_POST["profession"];
    $secteur = $_POST["secteur"];
    $salaire = $_POST["salaire"];
    $doj = $_POST["doj"];
    echo "Query 1 executed successfully!";

    // Faites ici les validations nécessaires sur les données reçues, si besoin

    // Enregistrer les données dans la base de données
    try {
        // Insérer les informations de l'utilisateur dans la table "user"
        $sql = "INSERT INTO user (cin, nom, prenom, email, pwd, ville, adresse, codePostal, phone, dob) 
                VALUES ('$cin', '$nom', '$prenom', '$mail', '$pwd', '$ville', '$adresse', '$codePostal', '$tel', '$dob')";
        mysqli_query($conn, $sql);

        // Insérer les informations professionnelles dans la table "profession"
        $sql = "INSERT INTO profession (cin, fonction, secteurActivite, revenu) 
                VALUES ('$cin', '$profession', '$secteur', '$salaire')";
        mysqli_query($conn, $sql);

        // Si tout s'est bien passé, vous pouvez renvoyer un message de succès
        echo "Les informations ont été enregistrées avec succès !";
    } catch (Exception $e) {
        // Gérer les erreurs en cas de problème avec la base de données
        echo "Erreur : " . $e->getMessage();
    }
}
