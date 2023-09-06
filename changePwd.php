
<?php

$msg = "";

include 'config.php';

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE codeVerif='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

            if ($password === $confirm_password) {
                $query = mysqli_query($conn, "UPDATE user SET pwd='{$password}', codeVerif='' WHERE codeVerif='{$_GET['reset']}'");

                if ($query) {
                    header("Location: login.php");
                }
            } else {    
                $msg = "<div class='alert alert-danger'>Le mot de passe et le mot de passe de confirmation ne correspondent pas.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Le lien de réinitialisation ne correspond pas.</div>";
    }
} else {
    header("Location: changePwd.php");
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
        <link rel="stylesheet" href="css/media.css"> -->
        <link rel="shortcut icon" href="images/logos.jpg" type="image/x-icon">
       

<style>
        .navbar {
            background-color: var(--secondary-color);
            z-index: 9;
        }
        .featured-section .row {
            position: relative;
            bottom: 100px;
            /* padding: 20px; */
            margin-bottom: 40px;
        }
        .featured-section {
            background-color: var(--secondary-color);
            border-radius: 0 0 100px 100px;
            padding-bottom: 56px;
        }
        .logo {
                      position: absolute;
                      top: 10px;
                      left: 25px;
                      width: 105px; /* adjust the width as needed */
                      height: auto; /* maintains aspect ratio */
                    }
                
                * {
                    margin: 0px;
                    padding: 0px;
                }
                #body a {
                    text-decoration: none;
                }
                #body {
                    height: 90vh;
                    /* background: #5C258D;
                    background: -webkit-linear-gradient(to right, #2a8caf, #7329b4);
                    background: linear-gradient(to right, #2a8caf, #5C258D); */
                
                    /* background-image: url('../images/aerial-view-business-team.jpg'); */
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;
                }
                .brandName img {
                    height: 75px;
                }
                .row{
                    margin-top: 50px;
                    justify-content: center;
                    
                }
                
                #body .container .row > div {
                    margin: 0 auto;
                }
                #body .container .row  {
                    margin-top:300px;
                }
                .form-card {
                    border-radius: 10px;
                    text-align: center;
                    padding: 25px;
                    background-color: white;
                    box-shadow: 0px 3px 10px 0px rgba(0, 0, 0, 0.2);
                    max-width: 900px;
                    
                }
                
                .form input {
                    margin-bottom: 15px;
                    border: none;
                    border-bottom: 1px solid rgb(236, 39, 39);
                    font-family: var(--title-font-family);
                    font-size: var(--menu-font-size);
                    font-weight: var(--font-weight-medium);
                }
                .form input::after {
                    border: none;
                }
                form .register {
                    /* background: #a64bf4; */
                    background: -webkit-linear-gradient(right, #ff4d17, #ff9950);
                    border-radius: 30px;
                    /* padding: 7px; */
                    color: white;
                    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                    font-size: 17px;
                    /* margin: 12px 10px; */
                    margin-bottom: 10px;
                    margin-top: 26px;
                    transition: all 0.8s;
                    text-transform: uppercase;
                }
                form .register:hover{
                    /* background: #a64bf4; */
                    background: -webkit-linear-gradient(right,#ff9950,#ff4d17);
                    border-radius: 30px;
                    color: rgb(167, 192, 221);
                }
                .validation {
                    font-size: 12px;
                    margin: 0px;
                }
                
                .validation .fa-times-circle {
                    display: none;
                }
                .error {
                    color: red;
                }
                .success {
                    color: rgb(0, 243, 0);
                }
                
                /* LOGIN AREA  */

</style>

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
                                <a class="nav-link click-scroll" href="#section_Serv">Nos services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#sec_contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </nav>
  
            <div class="container" style="margin-bottom: 134px;">
                <div class="row">
                    <div class="col-lg-4 col-md-9 col-sm-9 col-9 justify-content-center text-center form-card">
                        <!-- LOGIN ARE  -->
                        <form  class="form" method="post" >
                            <div class="brandName mb-2">
                                <img src="public/images/salafin-logo-removebg.png">
                            </div>
                            <div class="loginErrorLogs"><?php echo $msg; ?></div>
                            <div class="form-group">
                                <input type="password"  class="form-control" name="password" placeholder="Nouveau mot de passe" required>
                                
                            </div>
                            <div class="form-group">
                                <input type="password"  class="form-control" name="confirm-password" placeholder="Confirmer le mot de passe" required>
                            </div>

                            <button type="submit" name="submit" class="register btn btn-block"> Valider</button>
                        
                        </form>
                        <div class="social-icons">
                            <p>Revenir à! <a href="login.php">Login</a>.</p>
                        </div>
                    </div>
                    </row>
                </div>
            </div>
    </body>
 
 <?php include 'footer.php'; ?>           
 </body>
</html>
