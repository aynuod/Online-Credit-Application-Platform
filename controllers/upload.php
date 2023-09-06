<?php

session_start();
require_once "../config.php";

$response = array();

$cin =$_SESSION['cin'];


// Access uploaded file data
$cinFile = $_FILES["cinFile"]["name"];
$checFile = $_FILES["checFile"]["name"];
$workFile = $_FILES["workFile"]["name"];
$cnssFile = $_FILES["cnssFile"]["name"];
$paieFile = $_FILES["paieFile"]["name"];
$fixeFile = $_FILES["fixeFile"]["name"];


// var_dump($checFile);

// var_dump($paieFile);
// var_dump($cinFile);

 // Handle file uploads
 $uploadsDir = "uploads/"; // Create a directory named "uploads" to store the uploaded files
 $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf'); // Add more extensions if needed
 $uploadedFiles = array();

 foreach ($_FILES as $fileKey => $fileInfo) {
     $fileTmpName = $fileInfo['tmp_name'];
     $fileName = $fileInfo['name'];
     $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

     // Check if the file extension is allowed
     if (in_array($fileExtension, $allowedExtensions)) {
         $newFileName = uniqid('file_') . '.' . $fileExtension;
         $targetFilePath = $uploadsDir . $newFileName;

         // Move the file to the uploads directory
         if (move_uploaded_file($fileTmpName, $targetFilePath)) {
             // Store the uploaded file names in the $uploadedFiles array
             $uploadedFiles[$fileKey] = $newFileName;
         } else {
             // Handle file upload error
             $errorMessage = "Error uploading file: $fileName";
             $response['success'] = false;
             $response['message'] = $errorMessage;
             
             // Optionally, you can exit here to stop further processing:
             // exit(json_encode($response));
         }
     } else {
         // Handle invalid file type
         $errorMessage = "Invalid file type: $fileName";
         $response['success'] = false;
         $response['message'] = $errorMessage;
       
     }
 }  

 $cin= $_SESSION['cin'];


    // // Insérer les informations de l'utilisateur dans la table "user"
    $sql = "INSERT INTO pieces (cin, file_type, file_name, file_path) 
    VALUES ('$cin', 'CIN', '{$uploadedFiles['cinFile']}', '{$uploadsDir}{$uploadedFiles['cinFile']}'),
           ('$cin', 'Spécimen de chèque', '{$uploadedFiles['checFile']}', '{$uploadsDir}{$uploadedFiles['checFile']}'),
           ('$cin', 'Attestation de travail', '{$uploadedFiles['workFile']}', '{$uploadsDir}{$uploadedFiles['workFile']}'),
           ('$cin', 'Attestation de CNSS', '{$uploadedFiles['cnssFile']}', '{$uploadsDir}{$uploadedFiles['cnssFile']}'),
           ('$cin', 'Quittance Electricité /tél fixe', '{$uploadedFiles['fixeFile']}', '{$uploadsDir}{$uploadedFiles['fixeFile']}'),
           ('$cin', 'Dernier bulletin de paie', '{$uploadedFiles['paieFile']}', '{$uploadsDir}{$uploadedFiles['paieFile']}')";
           
    mysqli_query($conn, $sql);
    mysqli_commit($conn);


 ?>