
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Form </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="public/css/bootstrap.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
     
    <link href="public/css/bootstrap-icons.css" rel="stylesheet">
    <link href="public/css/index01.css" rel="stylesheet">

        
    <link href="public/css/templatemo-topic-listing.css" rel="stylesheet">      

    <link rel="stylesheet" href="public/css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>	
    <script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</head>


</style>
<body>


<main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <!-- <i class="bi-back"></i> -->
                    <!-- <span>SALAFIN</span> --> 
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="login.php" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarNav" >
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll active" href="#section_1">Accueil</a>
                        </li>
                
                        <li class="nav-item">
                            <a class="nav-link click-scroll inactive" href="#section_2">Nos services</a>
                        </li>
                
                        <li class="nav-item">
                            <a class="nav-link click-scroll inactive" href="#section_3">Comment en bénéficier ?</a>
                        </li>
                
                        <li class="nav-item">
                            <a class="nav-link click-scroll inactive" href="#section_4">FAQ</a>
                        </li>
                
                        <li class="nav-item">
                            <a class="nav-link click-scroll inactive" href="#section_5">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="d-none d-lg-block">
                    <a href="login.php" class="navbar-icon bi-person smoothscroll"></a>
                </div>
                    
                
            </div>
    </nav>
    <form action="process_demande.php" method="POST">
    <input type="hidden" name="question1_response" id="question1_response">
    <input type="hidden" name="question2_response" id="question2_response">
    <input type="hidden" name="question3_response" id="question3_response">
    <input type="hidden" name="question4_response" id="question4_response">

  <div style="background-color: #f7f8fa;">
    <div class="container" style="padding: 50px;">
        <div id="wrapper" >
            
            <div class="shadow-sm p-3 mb-5 bg-white rounded px-5 py-5" id="form" style="width: 100%;max-width: 920px;min-width: 275px;" >
                <div class="titleResponsive d-flex align-items-center justify-content-center">
                    <h2 id="questionTitle">Où en êtes-vous dans votre projet&nbsp;?</h2>
                </div>
                
                <div id="step" class="contentQuest noenter" style="display: block;">
                    <div class="padContent">
                        <div class="row slider items">
                            <div class="col-12 col-sm-4 slideBg first"><a href="#" data-question-id="question1" data-option-id="option1" class="checker">Ancien</a></div>
                            <div class="col-12 col-sm-4 slideBg"><a href="#" data-question-id="question1" data-option-id="option2" class="checker">Neuf</a></div>
                            <div class="col-12 col-sm-4 slideBg last"><a href="#" data-question-id="question1" data-option-id="option3" class="checker">Vente sur plan (VEFA)</a></div>
                        </div>
                    </div>
                </div>
                
                <div class="pagination ustify-content-between" id="btn_form">
                    <a href="#" class="prev btPrev" id="btPagiPrev" ><span>Précédent</span></a>
                    
                </div>
            </div>
            
            <!-- simulateur -->
            <div class="shadow-sm p-3 mb-5 bg-white rounded px-4 py-4" id="simulateur" style=" display: none ;max-width: 608px;">
                <h2 class="form-title">Simulez votre crédit et réalisez vos projets financiers !</h2>
                <form action="" class="form-simulate">
                    <div class="row py-4">
                        <label for="credit-input" class="col-12 col-sm-6 col-md-8 login__label">Montant du crédit (en DH) :</label>
                        
                        <div class="input-group-append col-6 col-md-4">
                            <input id="credit-input" class="login_input" value="15000" type="number" min="0" max="300000" step="1000" required>
                            <span class="input-group-text">DH</span>
                        </div>
                    </div>  
        
                    <!-- Add the new slider for the monthly installment -->
                    <div class="row">
                        <label for="monthlyInstallment-input" class="col-12 col-sm-6 col-md-8 login__label">Mensualité (en DH) :</label>
                        <div class="input-group-append col-6 col-md-4">
                            <input id="monthlyInstallment-number" class="login_input login_number" value="1500" type="number" min="1500" max="5000" step="100" required="">
                            <span class="input-group-text">DH</span>
                        </div>
                        <input id="monthlyInstallment-input" class="col-10 py-4 login_input login_slider" type="range" min="1500" max="5000" step="100" required="">
                        <span id="monthlyInstallment-value" style="display: none;">850 DH</span>

                    </div>
                    
                    <div class="row">
                        <label for="duration-input" class="col-12 col-sm-6 col-md-8 login__label">Durée du crédit (en mois) :</label>
                        
                        <div class="input-group-append col-6 col-md-4">
                            <input id="duration-number" class=" login_input login_number" value="6" type="number" min="6" max="60" step="1" required="">
                            <span class="input-group-text">Mois</span>
                        </div>

                        <input id="duration-input" class="col-10 py-4 login_input login_slider" type="range" min="6" max="60" step="1" required="">
                        <span id="duration-value" style="display: none;">6 mois</span>
                    </div>

                    <div class="pagination justify-content-between" id="btn_form">
                        <a href="#" class="prev btPrev" id="btPagiPrev" ><span>Précédent</span></a>
                        <a href="#" class="next btNext" id="btPagiNext"><span>Suivant</span></a>
                        
                    </div>
                </form>  
            </div>

            <!-- Offres -->
            <div class="shadow-sm p-3 mb-5 bg-white rounded px-5 py-5" id="offers-container" style="display: none; width: 100%;  max-width: 920px; min-width: 357px; ">
                <div class="row" id="offers-row"> 
                    <div class="titleResponsive d-flex align-items-center justify-content-center">
                        <h2 id="questionTitle" >Choisissez l'offre la plus adaptée à votre projet &nbsp;</h2>
                    </div>
                </div>
            </div> 

            <!-- Modèle de confirmation -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirmation de la demande de crédit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir soumettre cette demande de crédit ?</p>
                            <p><b>Détails de la demande :</b></p>
                            <p id="detailsPlaceholder"></p> <!-- C'est ici que nous afficherons les détails -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-primary" id="btnConfirm">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
    // ... Votre code existant

// Lorsque l'utilisateur clique sur le bouton "Confirmer" dans le modèle de confirmation
$(document).on('click', '#btnConfirm', function() {
    // Envoie les données sélectionnées à process_demande.php pour enregistrement
    $.post('process_demande.php', selectedOptions, function(response) {
        // Gérer la réponse du serveur
        if (response.success) {
            // Demande enregistrée avec succès
            // Vous pouvez afficher un message ou rediriger l'utilisateur vers une page de confirmation
            console.log("Demande enregistrée avec succès:", response.message);
        } else {
            // Il y a eu une erreur lors de l'enregistrement de la demande
            console.log("Erreur lors de l'enregistrement de la demande:", response.error);
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        // Gérer les erreurs de la requête AJAX
        console.log("Erreur AJAX:", textStatus, errorThrown);
    });

    // Fermer le modèle de confirmation après le traitement
    $('#confirmationModal').modal('hide');
});


</script>



            <div class="shadow-sm p-3 mb-5 bg-white rounded px-5 py-5" id="form-wizard" style="display:none;" >
                <?php include 'form_wizard.php'; ?>
            </div>

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</main>

<script src="public/js/script.js"></script>
   




  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


 
   
    <script>
        var currentQuestionIndex = 0;
        var questions =[];
        var selectedOptions = {};
        var questionMappings = {

            

            "question1": {
                "option1": "question4", // If option1 is selected in question1, move to question3
                "option2": "question2"  
            },
            "question2": {
                "option1": "question3", // If option1 is selected in question2, move to question3
                "option2": "question3", // If option2 is selected in question2, move to question3
            },
            "question3": {
                "option1": "question", // If option1 is selected in question3, go back to question1
                "option2": "question" // If option3 is selected in question3, go back to question1
            },
            "question4": {
                "option1": "question", // If option1 is selected in question3, go back to question1
                "option1": "question", // If option1 is selected in question3, go back to question2
                "option2": "question", // If option2 is selected in question3, go back to question2
                "option3": "question" // If option3 is selected in question3, go back to question1
            }
        };
        var prevQuestionMappings = {
            "question1": {
                "option1": "question3", // If option1 is selected in question1, go back to question3
                "option2": "question1"  // If option2 is selected in question1, go back to question1
            },
            "question2": {
                "option1": "question1", // If option1 is selected in question2, go back to question1
                "option2": "question1"  // If option2 is selected in question2, go back to question1
            },
            "question3": {
                "option1": "question2", // If option1 is selected in question3, go back to question2
                "option2": "question2", // If option2 is selected in question3, go back to question2
                "option3": "question2"  // If option3 is selected in question3, go back to question2
            },
            "question4": {
                "option1": "question1", // If option1 is selected in question4, go back to question1
                "option2": "question1"  // If option2 is selected in question4, go back to question1
            }
        };


        // Charger le fichier JSON
        $.getJSON('dataJson/questions.json?v=' + Date.now(), function(data) {
            questions = data.questions;
    
            function displayQuestion(questionIndex) {
                var question = questions[questionIndex];
                console.log("display question " + questionIndex);
    
                $('#questionTitle').text(question.question);
                var optionsHtml = '';
                for (var i = 0; i < question.options.length; i++) {
                    var option = question.options[i];
                    var selectedClass = selectedOptions[question.id] === option.id ? 'selected' : '';
                    optionsHtml += '<div class="slideBg ' + selectedClass + '"><a href="#" data-question-id="' + question.id + '" data-option-id="' + option.id + '" class="checker">' + option.text + '</a></div>';
                }
    
                $('#step .slider').html(optionsHtml);
            }
    
            // Afficher la première question et ses options
            displayQuestion(currentQuestionIndex);
    
            /// Lorsque prev est cliquée
            $(document).on('click', '.prev', function(e) {
                e.preventDefault();
                // Get the previous question ID based on the selected option and current question
            var prevQuestionId = prevQuestionMappings[questions[currentQuestionIndex].id][selectedOptions[questions[currentQuestionIndex].id]];

            // Move to the previous question
            if (prevQuestionId && questions.findIndex(question => question.id === prevQuestionId) !== -1) {
                currentQuestionIndex = questions.findIndex(question => question.id === prevQuestionId);
                console.log("Moving to previous question: " + currentQuestionIndex);
                displayQuestion(currentQuestionIndex);
            } else {
                // If the previous question ID is not found or there are no previous questions, you can handle the beginning of the survey here.
                // For now, let's just log the selected options.
                console.log("Beginning of survey. Selected options: ", selectedOptions);
                
            }
            });

            
            // Lorsqu'une option est sélectionnée
            $(document).on('click', '.checker', function(e) {
                e.preventDefault();
                var questionId = $(this).data('question-id');
                var optionId = $(this).data('option-id');

                // Save the selected option
                selectedOptions[questionId] = optionId;

                // Get the next question ID based on the selected option and current question
                var nextQuestionId = questionMappings[questionId][optionId];

                // Move to the next question
                if (nextQuestionId && questions.findIndex(question => question.id === nextQuestionId) !== -1) {
                    currentQuestionIndex = questions.findIndex(question => question.id === nextQuestionId);
                    console.log("Moving to question: " + currentQuestionIndex);
                    
                    displayQuestion(currentQuestionIndex);
                } else {
                    // If the next question ID is not found or there are no more questions, you can handle the end of the survey here.

                    console.log("End of survey. Selected options: ", selectedOptions);
                    displaySimulator();
                }
            });

            // Function to display the simulator
            function displaySimulator() {
                // Masquer le formulaire de questions
                document.getElementById("form").style.display = "none";
                // Afficher le formulaire de simulation
                document.getElementById("simulateur").style.display = "block";
                
            }

    });


   


    </script>
    
</form>
</body>

</html>
