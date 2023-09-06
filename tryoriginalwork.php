<?php
session_start();
include 'config.php'; // Assurez-vous que config.php inclut votre code de connexion à la base de données

if (!isset($_SESSION['SESSION_CIN'])) {
    header('Location: login.php'); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
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
}?>


<!-- Votre formulaire HTML commence ici -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord utilisateur</title>
  <!-- Lien vers Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lien vers les icônes de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Lien vers Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  

</head>
<body>

  <div class="sidebar">
    <div class="logo-container">
      <img src="public/images/salafin-removebg.png" alt="Your Logo">
    </div>

    <a href="#" onclick="showSection('profile')"><i class="bi bi-person me-2"></i>Mon profil</a>
    <a href="#" onclick="showSection('demands')"><i class="bi bi-file-earmark-text me-2"></i>Mes demandes</a>
    <a href="#" onclick="showSection('newDemand')"><i class="bi bi-file-earmark-plus me-2"></i>Effectuer une nouvelle demande</a>
      <a href="#" onclick="logout()"><i class="bi bi-person me-2"></i> Se deconnecter </a>
    <div class="footer">
      <p>&copy; 2023 | Salafin</p>
    </div>
  </div>

<div class="container">
  <div id="profileSection" class="section">
    <!-- Section Profil utilisateur -->
    <div class="card mt-4">
      <div class="card-header">
        Mon profil
      </div>
<!-- User's photo container -->
<div class="user-photo-container">
  <input type="file" accept="image/*" id="photo" onchange="handlePhotoUpload(event)">
  <img id="userPhoto" src="path_to_default_photo.jpg" alt="User Photo" class="user-photo">
</div>
<script>// Function to handle photo upload and display the updated photo
  function handlePhotoUpload(event) {
    const photoInput = event.target;
    const userPhoto = document.getElementById('userPhoto');
  
    // Check if the user selected a file
    if (photoInput.files && photoInput.files[0]) {
      const reader = new FileReader();
  
      // Read the selected file as a data URL
      reader.readAsDataURL(photoInput.files[0]);
  
      // When the file is loaded, update the user photo
      reader.onload = function () {
        userPhoto.src = reader.result;
      };
    }
  }
  </script>
          <!-- User information -->
          <div class="user-info">
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="cin" class="form-label">CIN</label>
            <input type="text" class="form-control" id="cin" placeholder="Entrez votre CIN" readonly>
          </div>
          <div class="col-md-4">
            <label for="firstName" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstName" placeholder="Entrez votre prénom" readonly>
          </div>
          <div class="col-md-4">
            <label for="lastName" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastName" placeholder="Entrez votre nom" readonly>
          </div>
        </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
            </div>
            <div class="mb-3">
              <label for="phoneNumber" class="form-label">Numéro de téléphone</label>
              <input type="tel" class="form-control" id="phoneNumber" placeholder="Entrez votre numéro de téléphone">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">Date de Naissance</label>
                <input type="date" class="form-control" id="dob" readonly>
              </div>
              <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="address" value=" votre Address" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" class="form-control" id="city" value=" votre Ville" readonly>
              </div>
              <div class="col-md-6 mb-3">
                <label for="postalCode" class="form-label">Code Postal</label>
                <input type="text" class="form-control" id="postalCode" value=" votre Code Postal" readonly>
              </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="profession" class="form-label">Profession</label>
                <input type="text" class="form-control" id="profession" value=" votre Profession" readonly>
              </div>
            </div>

            
            
            <!-- Modifier le mot de passe -->
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="oldPassword" class="form-label">Modifier le mot de passe</label>
              </div>
              <div class="col-md-4 mb-3">
                <div class="input-group">
                  <input type="password" class="form-control" id="oldPassword" placeholder="Ancien mot de passe">
                  <div class="input-group-append">
                    <span class="input-group-text" onclick="togglePasswordVisibility('oldPassword')">
                      <i class="fas fa-eye-slash" id="toggleEyeOldPassword"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="input-group">
                  <input type="password" class="form-control" id="newPassword" placeholder="Nouveau mot de passe">
                  <div class="input-group-append">
                    <span class="input-group-text" onclick="togglePasswordVisibility('newPassword')">
                      <i class="fas fa-eye-slash" id="toggleEyeNewPassword"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="input-group">
                  <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmez le nouveau mot de passe">
                  <div class="input-group-append">
                    <span class="input-group-text" onclick="togglePasswordVisibility('confirmPassword')">
                      <i class="fas fa-eye-slash" id="toggleEyeConfirmPassword"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Bouton pour mettre à jour les informations utilisateur -->
            <button type="submit" class="btn btn-primary">Mettre à jour les informations</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>// Pré-remplir les champs du formulaire avec les données récupérées
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById('cin').value = "<?php echo $cin; ?>";
  document.getElementById('firstName').value = "<?php echo $prenom; ?>";
  document.getElementById('lastName').value = "<?php echo $nom; ?>";
  document.getElementById('email').value = "<?php echo $email; ?>";
  document.getElementById('phoneNumber').value = "<?php echo $phone; ?>";
  document.getElementById('postalCode').value = "<?php echo $codePostal; ?>";
  document.getElementById('city').value = "<?php echo $ville; ?>";
  document.getElementById('address').value = "<?php echo $adresse; ?>";
  document.getElementById('dob').value = "<?php echo $dob; ?>";
  document.getElementById('profession').value = "<?php echo $profession; ?>";
  document.getElementById('oldPassword').value = "<?php echo $pwd; ?>";

 


})


// ... autres champs du formulaire
</script> 



   <!-- Section Demandes -->
    <div id="demandsSection" class="section">
<div class="card mt-4">
  <div class="card-header">
    Demandes
  </div>
  <div class="card-body">
    <!-- Tableau pour afficher les demandes -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID de la demande</th>
          <th>Description</th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ajouter les lignes dynamiquement à partir des données côté serveur ou avec JavaScript -->
        <tr onclick="toggleDemandDetails('demande1')">
          <td>14568</td>
          <td>Demande de crédit personnel</td>
          <td>Approuvée</td>
        </tr>
        <tr onclick="toggleDemandDetails('demande2')">
          <td>12356</td>
          <td>Demande de financement automobile </td>
          <td>En attente</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="demandDetailsModal" tabindex="-1" aria-labelledby="demandDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="demandDetailsModalLabel">Détails de la demande</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="demandDetailsModalBody">
        <!-- The demand details will be dynamically filled here -->
      </div>
    </div>
  </div>
</div>
</div>
     <!-- New Demands Section -->
    <div id="newDemandSection" class="section">
    <div class="card mt-4">
      <div class="card-header">
        Effectuer une nouvelle demande
      </div>
      <div class="card-body">
           <!-- Form to submit new demands -->
         <formid="newDemandForm">
        <div class="mb-3">
          <label for="creditType" class="form-label" style="font-weight: bold;">Type de crédit :</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="creditType" id="besoinArgent" value="besoin_argent" checked>
            <label class="form-check-label" for="besoinArgent">
              Besoin d'argent
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="creditType" id="creditAuto" value="credit_auto">
            <label class="form-check-label" for="creditAuto">
              Crédit automobile
            </label>
          </div>
          <div class="col-md-6">
            <label for="desiredAmount" class="form-label" style="font-weight: bold;">Somme désirée (en DH) :</label>
            <input type="number" class="form-control" id="desiredAmount" placeholder="Entrez la somme désirée">
          </div>
          <div class="col-md-6">
            <label for="creditDuration" class="form-label" style="font-weight: bold;">Durée de crédit (en mois) :</label>
            <input type="number" class="form-control" id="creditDuration" placeholder="Entrez la durée de crédit">
          </div>
        </div>
        <div class="mb-3">
          <label for="demandDescription" class="form-label" style="font-weight: bold;">Entrer les détails de votre demande :</label>
          <textarea class="form-control" id="demandDescription" rows="3" placeholder="Exemple : Je vous contacte pour solliciter un crédit personnel. Merci de me fournir les détails sur les conditions et la procédure de demande."></textarea>
        </div>

        <!-- Add more input fields for new demand details -->

        <!-- Button to submit the new demand -->
      <button type="submit" class="btn btn-primary" onclick="showConfirmationPopup()">Soumettre ma demande</button>
      </form>
    </div>
  </div>
</div>
  <!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body text-center" id="confirmationModalBody">
        <!-- The confirmation message will be dynamically filled here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="redirectToMesDemandes()">Voir ma demande</button>
      </div>
    </div>
  </div>
</div>
  <!-- Lien vers Bootstrap JS et tout autre script nécessaire -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePasswordVisibility(inputId) {
    const inputField = document.getElementById(inputId);
    const toggleIcon = document.getElementById(`toggleEye${inputId.charAt(0).toUpperCase() + inputId.slice(1)}`);

    if (inputField.type === "password") {
      inputField.type = "text";
       toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");

    } else {
      inputField.type = "password";
    toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    }
  }
  function checkCustomOccupation() {
    const customOccupationContainer = document.getElementById("customOccupationContainer");
    const occupationSelect = document.getElementById("occupation");

    if (occupationSelect.value === "other") {
      customOccupationContainer.style.display = "block";
    } else {
      customOccupationContainer.style.display = "none";
    }
  }

   // Fonction pour basculer la visibilité des détails de la demande
 function toggleDemandDetails(demandId) {
  const demandDetailsData = getDemandDetailsData(demandId);
  const modalBody = document.getElementById('demandDetailsModalBody');

  modalBody.innerHTML = `
    <p><strong>Montant :</strong> ${demandDetailsData.montant}</p>
    <p><strong>Durée :</strong> ${demandDetailsData.durée}</p>
    <p><strong>Date de soumission :</strong> ${demandDetailsData.dateSoumission}</p>
  `;

  // Show the modal
  const modal = new bootstrap.Modal(document.getElementById('demandDetailsModal'));
  modal.show();
}

  // Fonction d'exemple pour récupérer les détails de la demande (Remplacez cela par votre logique réelle de récupération des données)
  function getDemandDetailsData(demandId) {
    // Remplacez cela par votre logique réelle de récupération des données en fonction de l'ID de la demande
    if (demandId === 'demande1') {
      return {
      montant: '100 000 DH',
      durée: '48 mois',
      dateSoumission: '2023-07-18'
        // Ajoutez plus de propriétés si nécessaire
      };
    } else if (demandId === 'demande2') {
      return {
      montant: '230 000 DH',
      durée: '26 mois',
      dateSoumission: '2023-07-09'
        // Ajoutez plus de propriétés si nécessaire
      };
    } else {
      // Gérer les cas où l'ID de la demande n'est pas trouvé
      return {
        montant: 'N/A',
        durée: 'N/A',
         dateSoumission:  'N/A',
        // Ajoutez plus de propriétés si nécessaire
      };
    }
  }
</script>
  <script>
 // Function to show/hide sections based on the selected menu item
    function showSection(sectionName) {
      const sections = document.getElementsByClassName('section');
      for (const section of sections) {
        if (section.id === `${sectionName}Section`) {
          section.style.display = 'block';
        } else {
          section.style.display = 'none';
        }
      }

      // Add active class to the clicked menu item and remove from others
      const menuItems = document.getElementsByClassName('sidebar')[0].getElementsByTagName('a');
      for (const menuItem of menuItems) {
        if (menuItem.getAttribute('onclick') === `showSection('${sectionName}')`) {
          menuItem.classList.add('active');
        } else {
          menuItem.classList.remove('active');
        }
      }
    }


    // By default, show the profile section when the page loads
    showSection('profile');

  // Function to handle photo update on photo click
  function updatePhotoOnClick() {
    document.getElementById('photo').click();
  }

  // Add an event listener to the user photo to call the function on click
  document.getElementById('userPhoto').addEventListener('click', updatePhotoOnClick);

  // Function to handle photo upload and display the updated photo
  function handlePhotoUpload() {
    const photoInput = document.getElementById('photo');
    const userPhoto = document.getElementById('userPhoto');

    // Check if the user selected a file
    if (photoInput.files && photoInput.files[0]) {
      const reader = new FileReader();

      // Read the selected file as a data URL
      reader.readAsDataURL(photoInput.files[0]);

      // When the file is loaded, update the user photo
      reader.onload = function () {
        userPhoto.src = reader.result;
      };
    }
  }

  // Add an event listener to the photo input field to call the function on change
  document.getElementById('photo').addEventListener('change', handlePhotoUpload);
 </script>
  <script>
  // Function to show the confirmation popup
  function showConfirmationPopup() {
    const confirmationMessage = "Votre demande a été prise en considération, merci pour votre confiance";
    const confirmationModalBody = document.getElementById('confirmationModalBody');
    confirmationModalBody.textContent = confirmationMessage;

    // Show the confirmation modal
    const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    confirmationModal.show();
  }

  // Function to redirect to the "Mes demandes" section
  function redirectToMesDemandes() {
    showSection('demands');
    // Optionally, you can also scroll to the "Mes demandes" section if it's not in view
    document.getElementById('demandsSection').scrollIntoView({ behavior: 'smooth' });
  }
</script>
  <!-- Add Bootstrap's JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>