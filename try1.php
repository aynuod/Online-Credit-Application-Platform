<?php
session_start();
include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $cin = $_POST["cinuser"];
    $pwd = $_POST["pwduser"];

    $sql = "SELECT * FROM user WHERE cin='{$cin}' AND pwd='{$pwd}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['SESSION_CIN'] = $cin;
        header("Location: try.php"); // Redirect to the desired page after successful login
    } else {
        $msg = "<div class='alert alert-danger'>CIN ou mot de passe incorrect.</div>";
    }
}
?>
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
    <?php
include "config.php";
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

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">User CIN</th>
          <th scope="col">Type</th>
          <th scope="col">Montant</th>
          <th scope="col">Durée</th>
          <th scope="col">Date de Soumission</th>
          <th scope="col">Statut</th>
          <th scope="col">Rendez-vous</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `demandes`"; // Utilisez le nom de votre table 'demandes'
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["user_cin"] ?></td>
            <td><?php echo $row["type"] ?></td>
            <td><?php echo $row["montant"] ?></td>
            <td><?php echo $row["duree"] ?></td>
            <td><?php echo $row["statut"] ?></td>
            <td><?php echo $row["date_soumission"] ?></td>
            <td><?php echo $row["rendez_vous"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
</body>
            
   
       
               

            


     
    <?php include 'footer.php'; ?>
</html>
