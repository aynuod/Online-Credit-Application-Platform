<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `demande` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: demandes.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}


// First, delete associated records from the child table
$sqlDeleteResponses = "DELETE FROM `demande_responses` WHERE demande_id = $id";
$resultDeleteResponses = mysqli_query($conn, $sqlDeleteResponses);

if (!$resultDeleteResponses) {
  echo "Failed to delete associated records: " . mysqli_error($conn);
  exit; // Exit the script if deletion fails
}

// Now, delete the record from the parent table
$sqlDeleteDemande = "DELETE FROM `demandes` WHERE id = $id";
$resultDeleteDemande = mysqli_query($conn, $sqlDeleteDemande);

if ($resultDeleteDemande) {
  header("Location: demandes.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>
?>
