
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
            <img src="public/images/salafin-removebg.png" alt="salafin" class="navbar-image">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php"><i class="fas fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i> Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userMenu">
                    <a class="dropdown-item" href="pro.php"><i class="fas fa-user"></i> Mon Profile</a>
                    <a class="dropdown-item" href="demandes.php"><i class="fas fa-clipboard-list"></i> Mes Demandes</a>
                    <a class="dropdown-item" href="contact.html"><i class="fas fa-envelope"></i> Contactez-nous</a>
                    <a class="dropdown-item" href="login.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

  

<?php
include "config.php";
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['SESSION_CIN'])) {
  header("Location: login.php"); // Redirect to the login page if not logged in
  exit; // Stop further execution
}

$userCIN = $_SESSION['SESSION_CIN']; // Get the CIN of the logged-in user

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
</head>

<body>
<style>.mb-3 {
    margin-bottom: 1rem!important;
    margin-top: 70px;
}</style>

  <div class="container">
  <div class="text-center mt-5">
    <h1 class="display-4" style="font-size: 3rem;">Bienvenue sur le Tableau de Demandes</h1>
    <p class="lead" style="font-style: italic; color: #555; font-size: 1.3rem;">"Gérez vos rêves avec sagesse, chaque demande est un pas vers vos objectifs financiers."</p>
    <hr style="width: 100%; border-color: #888;">
</div>
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn btn-dark mb-3">Ajouter une nouvelle demande</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Type de credit</th>
          <th scope="col">Montant</th>
          <th scope="col">Durée</th>
          <th scope="col">Statut</th>
          <th scope="col">Date de Soumission</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $cin = mysqli_real_escape_string($conn, $userCIN);

        $sql = "SELECT * FROM `demande` WHERE cin = '$cin'"; 
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          die("Query failed: " . mysqli_error($conn));
      }
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["idDemande"] ?></td>
            <td><?php echo $row["typeCredit"] ?></td>
            <td><?php echo $row["montant"] ?> DH</td>
            <td><?php echo $row["duree"] ?> Mois</td>
            <td><?php echo $row["statut"] ?></td>
            <td><?php echo (new DateTime($row["dSoumission"]))->format("d/m/Y") ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["idDemande"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["idDemande"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="container mt-5">
    <div class="alert alert-warning text-center" role="alert">
        <p style="font-size: 16px; margin-bottom: 10px;"><strong>Important!!</strong></p>
        <p style="font-size: 14px; margin-bottom: 10px;">* Le Prospects ne peut pas ajouter deux nouvelles demandes de même type simultanément.</p>
        <p style="font-size: 14px; margin-bottom: 10px;">* Le Prospects doit attendre la confirmation de l'affirmation de la demande précédente avant d'en ajouter une nouvelle.</p>
        <p style="font-size: 14px; margin-bottom: 10px;">* Après la première acceptation, le Prospects doit réserver un rendez-vous pour discuter avec l'agent. Vous pouvez réserver un rendez-vous dans la barre de menu.</p>
        <p style="font-size: 14px; margin-bottom: 0;">* Chaque modification ou suppression nécessite une confirmation de la part du backoffice.</p>
    </div>
</div>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
</body>

    <?php include 'footer.php'; ?>
</html>
