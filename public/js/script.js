var interestRate = 3.5;

// Fonction pour mettre à jour la valeur affichée à côté du curseur (slider) ou du champ de saisie (input)
function updateValue(inputId, sliderId, valueId, unit) {
    const input = document.getElementById(inputId);
    const slider = document.getElementById(sliderId);
    const valueElement = document.getElementById(valueId);

    valueElement.textContent = input.value + ' ' + unit;
    slider.value = input.value;
}

// Mise à jour des valeurs du curseur et du champ de saisie au chargement de la page
updateValue('monthlyInstallment-number', 'monthlyInstallment-input', 'monthlyInstallment-value', 'DH');
updateValue('duration-number', 'duration-input', 'duration-value', 'mois');

// Écouter les événements de changement du champ de saisie de la mensualité
document.getElementById('monthlyInstallment-number').addEventListener('input', function() {
  console.log("monthlyInstallment-number");
    updateValue('monthlyInstallment-number', 'monthlyInstallment-input', 'monthlyInstallment-value', 'DH');
    updateDurationFromMonthlyInstallment(); // Mettre à jour la durée du crédit lorsque la mensualité change
});

// Écouter les événements de changement du curseur de la mensualité
document.getElementById('monthlyInstallment-input').addEventListener('input', function() {
    updateValue('monthlyInstallment-input', 'monthlyInstallment-number', 'monthlyInstallment-value', 'DH');
    updateDurationFromMonthlyInstallment(); // Mettre à jour la durée du crédit lorsque la mensualité change

  });

// Écouter les événements de changement du champ de saisie de la durée du crédit
document.getElementById('duration-number').addEventListener('input', function() {
    updateValue('duration-number', 'duration-input', 'duration-value', 'mois');
    updateMonthlyInstallmentFromDuration(); // Mettre à jour la mensualité lorsque la durée du crédit change
});

// Écouter les événements de changement du curseur de la durée du crédit
document.getElementById('duration-input').addEventListener('input', function() {
    updateValue('duration-input', 'duration-number', 'duration-value', 'mois');
    updateMonthlyInstallmentFromDuration(); // Mettre à jour la mensualité lorsque la durée du crédit change
});

// Your existing JavaScript code
function updateDurationFromMonthlyInstallment() {

    // Get user input values
    var creditAmount = parseFloat(document.getElementById("credit-input").value);
    var monthlyInstallment = parseFloat(document.getElementById("monthlyInstallment-input").value);

    // Calculate loan duration
    var monthlyInterestRate = interestRate / 100 / 12;
    var loanDuration = Math.ceil(Math.log(monthlyInstallment / (monthlyInstallment - creditAmount * monthlyInterestRate)) / Math.log(1 + monthlyInterestRate));

    // Update the loan duration slider and display
    document.getElementById("duration-input").value = loanDuration;
    document.getElementById("duration-number").value = loanDuration;
    // updateSliderValue('duration-number','duration-input', 'duration-value', 'mois');
}

function updateMonthlyInstallmentFromDuration() {
    // Get user input values
    var creditAmount = parseFloat(document.getElementById("credit-input").value);
    var loanDuration = parseInt(document.getElementById("duration-input").value);

    // Calculate monthly payment
    var monthlyInterestRate = interestRate / 100 / 12;
    var numberOfPayments = loanDuration;
    var monthlyPayment = (creditAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));
    monthlyPayment= monthlyPayment.toFixed(2);

    // Update the monthly installment slider and display
    document.getElementById("monthlyInstallment-input").value = monthlyPayment;
    document.getElementById("monthlyInstallment-number").value = monthlyPayment;
    
} 


function calculateMonthlyInstallment(creditAmount, loanDuration) {
  var monthlyInterestRate = interestRate / 100 / 12;
  var numberOfPayments = loanDuration;
  var monthlyPayment = (creditAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));
  return monthlyPayment.toFixed(2);
}

document.getElementById("btPagiNext").addEventListener("click", function(event) {
  event.preventDefault(); // Prevent form submission

  document.getElementById("form").style.display = "none";
  document.getElementById("simulateur").style.display = "none";
  document.getElementById("offers-container").style.display = "block";

  // Get user input values
  var creditAmount = parseFloat(document.getElementById("credit-input").value);
  var initialDuration = parseInt(document.getElementById("duration-input").value);

  var offersContainer = document.getElementById("offers-row");  

  // Si la durée saisie est supérieure à 12 mois, afficher les offres en tranches de 6 mois
  if (initialDuration > 12) {
    var durations = [initialDuration - 6, initialDuration, initialDuration + 6];
    var miniTitle= ["Mensualité moins élevée", "<b>Simulation personnalisée </b>", "Remboursement plus rapide"];
  } else {
      var durations = [6, 12, 18];
      var miniTitle= ["<b>Simulation personnalisée </b>", "Mensualité moins élevée", "Remboursement plus rapide"];
  }
  for (var i = 0; i < durations.length; i++) {
    var currentDuration = durations[i];
    var monthlyInstallment = calculateMonthlyInstallment(creditAmount, currentDuration);
    var totalAmount = monthlyInstallment * currentDuration; // Calcul du montant total du crédit
    totalAmount= totalAmount.toFixed(2);


    // Créer une nouvelle carte d'offre
  var card = document.createElement("div");
  card.classList.add("col-lg-4", "mb-4");
  card.innerHTML = `
      <div class="card card-margin">
          <div class="card-header no-border">
              <h5 class="card-title"><b>${monthlyInstallment} DH </b>
              <span class="widget-49-date-month" style="font-size: .9775rem; line-height: 1.395625rem;"> /Mois</span>
                          <sup>(1)</sup></h5>
          </div>
          <div class="card-body pt-0 d-flex justify-content-center align-items-center"">
              <div class="widget-49">
                  <h6 class="card-title ">${miniTitle[i]}</h6>
                  <div class="widget-49-title-wrapper">
                      <div class="widget-49-date-warning">
                          <h4 class="widget-49-date-day">${currentDuration}</h4>
                          <span class="widget-49-date-month">Mois</span>
                      </div>
                      <div class="widget-49-meeting-info">
                          <div class="widget-49-pro-title">  
                           <span class="widget-49-date-month" style="font-size:17px"> Montant Total </span>
                           <p class="widget-49-meeting-time">${totalAmount} DH</p>
                          </div>
                          <p class="widget-49-meeting-time">Mensualité - ${monthlyInstallment} DH</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <a href="#" id="btNext" class="waves-effect waves-light btn btn-outline btn-rounded btn-warning choose-offer-btn" data-duration="${currentDuration}" data-monthly="${monthlyInstallment}"
            onclick="showConfirmationModal('${currentDuration}', '${monthlyInstallment}')"><span>Choisir l'offre</span></a>
          </div>
      </div>
  `;
  // Ajouter la carte d'offre à la ligne d'offres
  offersContainer.appendChild(card);
}
});

function showConfirmationModal(offerDuration, offerMonthly) {
    var selectedOptionQuestion1 = selectedOptions["question1"];
    console.log(selectedOptionQuestion1)
    // Afficher le texte "Type de crédit : Crédit personnel" ou "Type de crédit : Crédit auto" en fonction de l'option sélectionnée
    var creditType = selectedOptionQuestion1 === "option1" ? "Crédit personnel" : "Crédit auto";

    // Récupérer les données du formulaire nécessaires pour l'affichage du modèle (modal)

    var montant = document.getElementById("credit-input").value;
    const wfirstName2 = document.getElementById("wfirstName2").value;
 
    // Créer un objet contenant les données de l'offre choisie et du formulaire
    const formData = {
        creditType: creditType,
        montant: montant,
        duree: offerDuration, // Utiliser la durée de l'offre sélectionnée
        offerMonthly: offerMonthly // Utiliser la mensualité de l'offre sélectionnée
    };

    // Afficher les détails de la demande dans le modèle de confirmation
    const detailsPlaceholder = document.getElementById("detailsPlaceholder");
    const detailsHtml = `<div class= 'col'> <b>Type de crédit :</b> ${formData.creditType}</div>
                        <div class= 'col'><b>Montant :</b> ${formData.montant} DH</div>
                        <div class= 'col'><b>Durée :</b> ${formData.duree} mois</div>
                        <div class= 'col'><b>Mensualité :</b> ${formData.offerMonthly} DH</div>`;
    detailsPlaceholder.innerHTML = detailsHtml;

    // Afficher le modèle (modal) de confirmation
    $('#confirmationModal').modal('show');

    // Écouter le clic sur le bouton "Confirmer" dans le modèle (modal)
    document.getElementById("btnConfirm").addEventListener("click", function(event) {
        event.preventDefault(); 
        $('#confirmationModal').modal('hide');

        console.log("creditType", formData.creditType);
        console.log("montant", formData.montant);
        console.log("duree", formData.duree);
        console.log("offerMonthly", formData.offerMonthly);

        // Send the data to register.php using an asynchronous request (AJAX)
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controllers/demande.php");
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
            // Request successful, do something if needed
            console.log("Data sent successfully!");
            } else {
            // Request failed, handle the error if needed
            console.error("Error sending data!");
            }
        }
        };
        xhr.send(JSON.stringify(formData));
        
        // Display the form wizard
        displayFormWizard();
    });

    function displayFormWizard() {
        // Hide the confirmation modal
        $('#confirmationModal').modal('hide');
    
        // Hide the offers container
        document.getElementById("offers-container").style.display = "none";
        console.log("heyg");
        // Show the form wizard
        document.getElementById("form-wizard").style.display = "block";
    }
}



