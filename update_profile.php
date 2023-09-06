<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data for profile updates
    $email = $_POST['email'];
    $phone = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalCode = $_POST['postalCode'];
    $cin = $_SESSION['SESSION_CIN'];

    // Update profile information
    $updateProfileQuery = "UPDATE user SET email=?, phone=?, adresse=?, ville=?, codePostal=? WHERE cin=?";
    $stmtProfile = mysqli_prepare($conn, $updateProfileQuery);

    if ($stmtProfile) {
        mysqli_stmt_bind_param($stmtProfile, "ssssss", $email, $phone, $address, $city, $postalCode, $cin);

        if (mysqli_stmt_execute($stmtProfile)) {
            // Profile update successful
            echo "Profile updated successfully.<br>";
        } else {
            // Handle profile update error
            echo "Error updating profile: " . mysqli_stmt_error($stmtProfile) . "<br>";
        }
        mysqli_stmt_close($stmtProfile);
    } else {
        // Handle statement preparation error
        echo "Error preparing profile update statement: " . mysqli_error($conn) . "<br>";
    }

    // Retrieve POST data for password update
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    echo "Old Password Provided: $oldPassword<br>";

    // Fetch the old password from the database
    $fetchPasswordQuery = "SELECT pwd FROM user WHERE cin=?";
    $stmtFetchPassword = mysqli_prepare($conn, $fetchPasswordQuery);

    if ($stmtFetchPassword) {
        mysqli_stmt_bind_param($stmtFetchPassword, "s", $cin);
        mysqli_stmt_execute($stmtFetchPassword);
        mysqli_stmt_bind_result($stmtFetchPassword, $storedPassword);
        mysqli_stmt_fetch($stmtFetchPassword);
        mysqli_stmt_close($stmtFetchPassword);

        // Verify old password by comparing it to the stored hash
        if (password_verify($oldPassword, $storedPassword)) {
            // If old password verification succeeds, proceed with updating the password
            $updatePasswordQuery = "UPDATE user SET pwd=? WHERE cin=?";
            $stmtPassword = mysqli_prepare($conn, $updatePasswordQuery);

            if ($stmtPassword) {
                // Hash the new password before inserting into the database
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmtPassword, "ss", $hashedPassword, $cin);

                if (mysqli_stmt_execute($stmtPassword)) {
                    // Password update successful
                    echo "Password updated successfully.";
                } else {
                    // Handle password update error
                    echo "Error updating password: " . mysqli_stmt_error($stmtPassword);
                }
                mysqli_stmt_close($stmtPassword);
            } else {
                // Handle query preparation error
                echo "Error preparing password update statement: " . mysqli_error($conn);
            }
        } else {
            // Handle case where old password is incorrect
            echo "Old password is incorrect.";
        }
    } else {
        // Handle query preparation error
        echo "Error preparing password retrieval statement: " . mysqli_error($conn);
    }
}
?>
