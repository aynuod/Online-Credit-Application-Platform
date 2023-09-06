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
        header("Location: demandes.php"); // Redirect to the desired page after successful login
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
                    min-width: 260px;
                    
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
                h4 {
                    margin-top: 0;
                    font-family: system-ui;
                    font-size: 20px;
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
                                <a class="nav-link click-scroll" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </nav>
  
            <div class="container" style="margin-bottom: 134px;">
                <div class="row">
                    <div class="col-lg-4 col-sm-7 justify-content-center form-card">
                        <!-- LOGIN ARE  -->
                        <form  class="form" method="post" >
                            <div class="brandName mb-2">
                                <img src="public/images/salafin-logo-removebg.png">
                            </div>
        
                            <div class="loginErrorLogs"> <?php echo $msg; ?></div>
                            <div class="form-group">
                                <input type="text" name="cinuser" id="cinuser" class="form-control" placeholder="Entrer votre CIN" data-rule="required" data-msg="Please enter your username address">
                                <div class="validation text-left text-danger"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwduser" id="pwduser" class="form-control" placeholder="Entrer votre mot de passe" data-rule="minlen:6" data-msg="Please enter your password">
                                <div class="validation text-left text-danger pwd"></div>
                            </div>
                            <p><a href="" id="forgotpwd" style="display: block;font-size: 15px;text-align: right;">mot de passe oublié ?</a></p>

        
                            <button type="submit" name="submit" class="register btn btn-block" id="login">Identifiez-vous</button>
                            <div class="link mt-4">
                                <p>Nouveau ici ?<a href="form.php" id="registerLink">Inscrivez-vous</a></p>
                            </div>
                        </form>
                    </div>
                    </row>
                </div>
            </div>
            
            <!-- /form -->
            <div id="forgotPasswordModal" class="modal">
                <div class="modal-content">
                    
                <h5 class="modal-title py-3">Mot de passe oublié</h5>
                    <div class="alert-close">
                        <span class="close" onclick="closeMod()">&times;</span>
                    </div>
                    <div class="content col-8">
                        
                        <div class="mdpErrorLogs"></div>
                        <form class="form" id="formpwd" action="" method="post">
                        <div class="form-group">
                            <input class="form-control mb-2 mr-sm-2" type="email" name="email" placeholder="Entrez votre email" required="">
                            <div class="validation text-left text-danger"></div>
                        </div>
                            <button class="register btn btn-block" style="
                                font-size: 15px;
                                margin-left: auto; 
                                margin-right: auto;
                                display: block;" name="submit" type="submit">Envoyer le lien de vérification</button>
                            
                        </form>
                        <div class="social-icons">
                            <p style="
                                display: block;
                                font-size: 15px;
                                text-align: right;
                            ">Back to! <a href="#" onclick="closeMod()">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
       
               

            

    </body>
 
    <?php include 'footer.php'; ?>

<script>
        function openMod() {
        const modal = document.getElementById('forgotPasswordModal');
        modal.style.display = 'block';
    }

        function closeMod() {
            const modal = document.getElementById('forgotPasswordModal');
            modal.style.display = 'none';
        }

        // Get the "mot de passe oublié ?" link element
        const forgotPasswordLink = document.getElementById('forgotpwd');

        // Add a click event listener to the link
        forgotPasswordLink.addEventListener('click', function(event) {
            event.preventDefault();
            openMod(); // Show the modal when the link is clicked
        });

        $(document).ready(function() {
            $("#formpwd").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "controllers/forgotPwd.php",
                    data: formData,
                    
                    success: function (response) {
                        console.log("success");
                        $(".mdpErrorLogs").html('<div class="alert alert-success">' + response.message + '</div>');  
                    },
                    error: function (xhr, status, error) {
                        // Handle any errors that occurred during form submission
                        try {
                            console.log("ERROOOR");
                            console.log("AJAX Error:", error);
                            console.log("Response Text:", xhr.responseText);
                            $(".mdpErrorLogs").html('<div class="alert alert-danger">' + response.message + '</div>');
                            
                        } catch (parseError) {
                            // Handle parsing error (e.g., response is not valid JSON)
                            console.log(xhr.responseText);
                            console.error("Error parsing response:", parseError);
                        
                        }
                    }
                });
            });
        });
</script>
        


        <!-- JAVASCRIPT FILES -->
                    <!-- <script src="js/jQuery-v3.5.1.js"></script> -->
                    <!-- <script src="js/main.js"></script> -->
                    <!-- <script src="plugin/bootstrap-4.5.0/js/bootstrap.bundle.js"></script>
                    <script src="plugin/bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
                    <script src="plugin/bootstrap-4.5.0/js/bootstrap.js"></script>
                    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
                    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
                    <script src="plugin/fontawesome-5.13.1/js/all.js"></script>
                    <script src="plugin/fontawesome-5.13.1/js/all.min.js"></script>
                    <script src="plugin/fontawesome-5.13.1/js/fontawesome.js"></script>
                    <script src="plugin/fontawesome-5.13.1/js/fontawesome.min.js"></script> -->
                    
   
    </body>
</html>
