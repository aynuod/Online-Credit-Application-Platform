
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
    session_start();
    include 'config.php';

    if (!isset($_SESSION['SESSION_CIN'])) {
        header('Location: login.php');
        exit;
    }

    $cin = $_SESSION['SESSION_CIN'];

    $sql = "SELECT * FROM user WHERE cin='{$cin}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $email = $row['email'];
        $pwd = $row['pwd'];
        $ville = $row['ville'];
        $adresse = $row['adresse'];
        $codePostal = $row['codePostal'];
        $phone = $row['phone'];
        $dob = $row['dob'];
        $profession = $row['profession'];
    }
    ?>

    <div class="container mt-5">
        <div class="card">
        <div class="alert alert-warning text-center" role="alert">
            <p style="font-size: 16px; margin-bottom: 10px;"><strong>Important!!</strong> Si vous prévoyez des modifications dans votre profession, salaire ou d'autres informations financières, veuillez nous en informer.</p>
            <p style="font-size: 14px; margin-bottom: 0;">La transparence dans ces informations nous permet de vous offrir les meilleures solutions de crédit adaptées à votre situation actuelle.</p>
        </div>
        <div class="card-body">
            <div class="row mb-3">
    <!-- <div class="col-md-12 text-center">
        <label for="profilePhoto" class="form-label"><i class="bi bi-image me-2"></i>Photo de profil</label>
    </div> -->
    <div class="col-md-12 text-center">
        <div id="photoPreview" class="rounded-circle user-photo">
            <img id="previewImage" src="path_to_user_photo.jpg" alt="User Photo">
        </div>
        <input type="file" class="form-control visually-hidden" id="profilePhoto" name="profilePhoto" accept="image/*">
        <button type="button" class="btn btn-secondary mt-2" id="uploadButton" >Télécharger votre photo</button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const profilePhotoInput = document.getElementById('profilePhoto');
        const previewImage = document.getElementById('previewImage');
        const uploadButton = document.getElementById('uploadButton');

        uploadButton.addEventListener('click', () => {
            profilePhotoInput.click();
        });

        profilePhotoInput.addEventListener('change', handleProfilePhotoUpload);

        function handleProfilePhotoUpload(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = () => {
                    previewImage.src = reader.result;
                };
            }
        }
    });
</script>
<style>.user-photo {
    width: 180px; /* Ajustez la taille souhaitée */
    height: 180px; /* Ajustez la taille souhaitée */
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto;
    background-color: #f0f0f0; /* Couleur de fond en cas d'absence d'image */
    display: flex;
    align-items: center;
    justify-content: center;
}

.user-photo img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 50%;
}</style>
                <form id="profileUpdateForm" method="POST" action="update_profile.php">
                    <!-- ... Vos champs de formulaire ... -->
                    <form id="profileUpdateForm" method="POST" action="update_profile.php">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label"><i class="bi bi-person me-2"></i>Prénom</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $prenom; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label"><i class="bi bi-person me-2"></i>Nom</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $nom; ?>"readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label"><i class="bi bi-envelope me-2"></i>Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="phoneNumber" class="form-label"><i class="bi bi-telephone me-2"></i>Numéro de téléphone</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="row">
        <div class="col-md-6 mb-3">
            <label for="dob" class="form-label"><i class="bi bi-calendar me-2"></i>Date de Naissance</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>"readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="address" class="form-label"><i class="bi bi-house-door me-2"></i>Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $adresse; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="city" class="form-label"><i class="bi bi-house me-2"></i>Ville</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $ville; ?>"readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="postalCode" class="form-label"><i class="bi bi-geo-alt me-2"></i>Code Postal</label>
            <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?php echo $codePostal; ?>"readonly>
        </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-12">
        <label for="oldPassword" class="form-label"><i class="bi bi-shield-lock me-2"></i>Modifier le mot de passe</label>
    </div>
    <div class="col-md-4">
        <div class="input-group">
            <input type="password" class="form-control" id="oldPassword" name="oldPassword" value="<?php echo $pwd; ?>" placeholder="Ancien mot de passe">
            <button class="btn btn-outline-secondary show-password-button" type="button" data-target="oldPassword"><i class="bi bi-eye"></i></button>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group">
            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nouveau mot de passe">
            <button class="btn btn-outline-secondary show-password-button" type="button" data-target="newPassword"><i class="bi bi-eye"></i></button>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmez le nouveau mot de passe">
            <button class="btn btn-outline-secondary show-password-button" type="button" data-target="confirmPassword"><i class="bi bi-eye"></i></button>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const showPasswordButtons = document.querySelectorAll('.show-password-button');

        showPasswordButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');
                const targetField = document.getElementById(targetId);
                togglePasswordVisibility(targetField);
            });
        });

        function togglePasswordVisibility(inputField) {
            if (inputField.type === 'password') {
                inputField.type = 'text';
            } else {
                inputField.type = 'password';
            }
        }
    });
</script>

                    <button type="submit" class="btn btn-primary"><i class="bi bi-check me-2"></i>Mettre à jour les informations</button>
                </form>
            </div>
        </div>
    </div>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>


    <?php include 'footer.php'; ?>
</html>
