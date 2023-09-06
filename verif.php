<?php
include_once("database.php");

// Variable for storing error messages
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['uName'];
    $password = $_POST['uPassword'];

    // Query to retrieve the user matching the username
    $query = "SELECT * FROM utilisateur WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the password matches
        if (password_verify($password, $user['password_hash'])) {
            // Correct password, log in the user
            // You can perform necessary actions here, such as setting sessions, etc.
            mysqli_close($connection);

            // Use JavaScript for redirection
            echo "<script>window.location.href = 'try.html';</script>";
            exit();
        } else {
            // Incorrect password, display an error message
            $error_message = "Incorrect username or password.";
        }
    } else {
        // User not found, display an error message
        $error_message = "Incorrect username or password.";
    }
}

// Close the database connection after performing the operations
mysqli_close($connection);
?>

