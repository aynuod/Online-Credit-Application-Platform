
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Content de vous revoir!</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
               
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <link href="public/css/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="public/css/login.css">
        

        <link href="public/css/templatemo-topic-listing.css" rel="stylesheet">   
        <meta name="viewport" content="width=device-width   , initial-scale=1.0">

        <!-- <link rel="stylesheet" href="css/main.css">
        <link rsel="stylesheet" href="css/media.css"> -->
        <link rel="shortcut icon" href="images/logos.jpg" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
       



</head>
    
    <body id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <!-- <i class="bi-back"></i> -->
                        <!-- <span>SALAFIN</span> -->
                        <img src="public/images/salafin-removebg.png" alt="salafin" class="navbar-image">
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="login.php" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </nav>
            <body>
              
            

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Demand Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>
    <style>.mb-4 {
    margin-bottom: 1.5rem!important;
    margin-top: 60px;
}</style>
           <?php
include "config.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $user_cin = $_POST['user_cin'];
  $type = $_POST['type'];
  $montant = $_POST['montant'];
  $duree = $_POST['duree'];
  $statut = $_POST['statut'];

  $sql = "UPDATE `demande` SET `cin`='$user_cin', `typeCredit`='$type', `montant`='$montant', `duree`='$duree' WHERE idDemande = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: demandes.php?msg=Data updated successfully");
    exit(); // Ajoutez cette ligne pour arrêter l'exécution après la redirection
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}


?>

    <?php
$sql = "SELECT * FROM `demande` WHERE idDemande = $id LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Query failed: " . mysqli_error($conn);
    exit(); // Ajoutez cette ligne pour arrêter l'exécution en cas d'échec
}
    ?>

<div class="container d-flex justify-content-center">
  <form action="" method="post" style="width:50vw; min-width:300px;">
    <div class="mb-3">
      <label class="form-label">User CIN:</label>
      <input type="text" class="form-control" name="user_cin" value="<?php echo $row['cin'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Type:</label>
      <input type="text" class="form-control" name="type" value="<?php echo $row['typeCredit'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Montant:</label>
      <input type="text" class="form-control" name="montant" value="<?php echo $row['montant'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Durée:</label>
      <input type="text" class="form-control" name="duree" value="<?php echo $row['duree'] ?>">
    </div>


        <div>
          <button type="submit" class="btn btn-success" name="submit">Modifier</button>
          <a href="demandes.php" class="btn btn-danger">Annuler</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

<?php include 'footer.php'; ?>

</html>
