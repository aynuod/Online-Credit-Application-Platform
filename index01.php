<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="shortcut icon" href="public/images/logos.jpg" type="image/x-icon">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap-grid.css">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugin/bootstrap-4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/all.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/all.min.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/fontawesome.css">
    <link rel="stylesheet" href="plugin/fontawesome-5.13.1/css/fontawesome.min.css">

    <title>Content de vous revoir ! Connectez-vous pour continuer votre expérience Salafin.</title>
</head>

<body id="body">
<img class="logo" src="public/images/salafin-removebg.png" alt="Logo">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-10 col-sm-10 col-10 justify-content-center text-center form-card">
                <!-- LOGIN ARE  -->
                <form action="verif.php" method="post" class="form" id="login-form">
                    <h3>Bienvenue de retour !</h3>
                    <div class="brandName mb-2">
                        <img src="public/images/logos.jpg" alt="Rusiru Ashan Kulathunga || Rusiru Official">
                    </div>

                    <div class="loginErrorLogs"></div>
                    <div class="form-group">
                        <input type="text" name="uName" id="uName" class="form-control" placeholder="Enter user name" data-rule="required" data-msg="Please enter your username address">
                        <div class="validation text-left text-danger"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="uPassword" id="uPassword" class="form-control" placeholder="Enter password" data-rule="minlen:6" data-msg="Please enter your password">
                        <div class="validation text-left text-danger pwd"></div>
                    </div>

                    <div class="form-group text-left">
                        <input type="checkbox" name="remember" id="remember"> Ckeck me in
                    </div>

                    <button type="submit" class="register btn btn-block" id="login">Identifiez-vous</button>

                    <div class="link mt-4">
                        <p>Nouveau ici ?<a href="register.php" id="registerLink">Inscrivez-vous</a></p>
                    </div>
                </form>
            </div>
            </row>
        </div>
    </div>

<style>
    .logo {
      position: absolute;
      top: 10px;
      left: 25px;
      width: 150px; /* adjust the width as needed */
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
    width: 75px;
    height: 75px;
}

#body .container .row > div {
    margin: 0 auto;
}
#body .container .row  {
    margin-top:150px;
}
.form-card {
    border-radius: 10px;
    text-align: center;
    padding: 30px 30px 0px 30px;
    background-color: white;
    box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.2);
    max-width: 900px;
    
}
.form-card form {
    padding: 30px;
    width: 590px;
}

.form input {
    margin-bottom: 2px;
    border-radius: 0%;
    padding: 20px 0px 20px 0px;
    border: none;
    border-bottom: 1px solid rgb(236, 39, 39);
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
.form input::after {
    border: none;
}
form .register{
    /* background: #a64bf4; */
    background: -webkit-linear-gradient(right, #ff4d17, #ff9950);
    border-radius: 30px;
    padding: 7px;
    color: white;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 20px;
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


    <!-- <script src="js/jQuery-v3.5.1.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.bundle.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    <script src="plugin/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/all.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/all.min.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/fontawesome.js"></script>
    <script src="plugin/fontawesome-5.13.1/js/fontawesome.min.js"></script>
</body>

</html>