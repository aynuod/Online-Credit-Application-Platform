<?php
include_once("database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_pass = $_POST['re_pass'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];
    $emploi = $_POST['emploi'];
    $telephone = $_POST['telephone'];

    if ($password === $re_pass) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Upload de la photo
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_path = "uploads/" . $photo;
        move_uploaded_file($photo_tmp, $photo_path);

        $query = "INSERT INTO utilisateur (username, password_hash, mail, nom, prenom, date_naissance, adresse, emploi, telephone, photo) VALUES ('$username', '$hashed_password', '$email', '$nom', '$prenom', '$date_naissance', '$adresse', '$emploi', '$telephone', '$photo_path')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            header("Location: index.php");
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}

mysqli_close($connection);
?>
