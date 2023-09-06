<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Salafin | votre partenaire de confiance</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <link href="public/css/bootstrap-icons.css" rel="stylesheet">

        <link href="public/css/templatemo-topic-listing.css" rel="stylesheet">      

        <link href="public/css/index.css" rel="stylesheet">

        


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
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Accueil</a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Nos services</a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Comment en bénéficier ?</a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">FAQ</a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5">Contact</a>
                            </li>

                    
                        

                    </div>

                        <div class="d-none d-lg-block">
                            <a href="login.php"   class="navbar-icon bi-person smoothscroll"></a>
                        </div>
                    
                </div>
            </nav>
     
            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white.text-center" >Découvrir.Simuler.Profiter
                            </h1>
                        </div>
                        <div class="button-container">
                            <button type="button" class="custom-button" data-target="#myModal" id="simulateButton">Simulez votre projet</button>
                        </div>
                        <!-- Your modal content -->
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <div class="logo-container">
                                    <img src="public/images/salafin-removebg.png" alt="salafin">
                                </div>
                                <div class="simulation-content">
                                    <h2>Trouvez le meilleur financement pour votre projet !</h2>
                                    <p>Simulez votre projet en quelques clics, c’est rapide et sans engagement</p>
                                    <a href="form.php">
                                    <button id="startSimulationButton" onclick="startSimulation()">Démarrer la simulation</button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="featured-section">
                <div class="container">

                    <div class="row justify-content-center">

                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>
                        <div class="carrousel">
                            <div class="images">
                                <img src="public/images/promossalafin1.jpg" alt="Promotion 1">
                                <img src="public/images/Salafin_Hna_Wahed_557x292_VF.jpg" alt="Promotion 2">
                                <img src="public/images/Salafin_Bann.jpg" alt="Promotion 3">
                                <img src="public/images/Salafine_VF.jpg" alt="Promotion 4">

                            </div>
                            <!-- Flèches de navigation -->
                            <div class="arrow prev" onclick="prevImage()">&#10094;</div>
                            <div class="arrow next" onclick="nextImage()">&#10095;</div>
                        </div>
                            <script>// script.js
                                const images = document.querySelectorAll(".images img");
                                const prevArrow = document.querySelector(".prev");
                                const nextArrow = document.querySelector(".next");
                                
                                let imageIndex = 0;
                                
                                function showImage(index) {
                                    images.forEach(img => img.classList.remove("active"));
                                    images[index].classList.add("active");
                                }
                                
                                function prevImage() {
                                    imageIndex--;
                                    if (imageIndex < 0) {
                                        imageIndex = images.length - 1;
                                    }
                                    showImage(imageIndex);
                                }
                                
                                function nextImage() {
                                    imageIndex++;
                                    if (imageIndex >= images.length) {
                                        imageIndex = 0;
                                    }
                                    showImage(imageIndex);
                                }
                                
                                // Afficher la première image au chargement de la page
                                showImage(imageIndex);
                                
                                // Défilement automatique toutes les 3 secondes (3000 millisecondes)
                                setInterval(nextImage, 3000);
                                </script>
                    </div>
                </div>
            </section>


            <section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-4">Nos services</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane" type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="true">Crédit Personnel</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="false">Crédit Auto</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="finance-tab-pane" role="tabpanel" aria-labelledby="finance-tab">
                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Crédit Personnel</h5>
                                                <p class="mb-0">Atteignez vos objectifs avec le service de Crédit Personnel de Salafin</p>
                                            </div>
                                        </div>
                                        <img src="public/images/personnel.jpg" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="custom-block custom-block-overlay">
                                    <div class="d-flex flex-column h-100">
                                        <div class="custom-block-overlay-text d-flex">
                                            <div>
                                                <h5 class="text-white mb-2">Réalisez vos aspirations avec le service de Crédit Personnel de Salafin.</h5>
                                                <p class="text-white">Que ce soit pour l'éducation, les améliorations domiciliaires ou des projets personnels, nous sommes là pour vous soutenir. Facilitez votre demande, obtenez des estimations personnalisées et prenez des décisions éclairées.</p>
                                                <a href="#section_1" class="btn custom-btn mt-2 mt-lg-3">Simulez Maintenant</a>
                                            </div>
                                        </div>
                                        <div class="section-overlay"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="education-tab-pane" role="tabpanel" aria-labelledby="education-tab">
                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Crédit Auto</h5>
                                                <p class="mb-0">Partez à l'aventure avec le service de Crédit Auto de Salafin</p>
                                            </div>
                                        </div>
                                        <img src="public/images/auto.jpg" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="custom-block custom-block-overlay">
                                    <div class="d-flex flex-column h-100">
                                        <div class="custom-block-overlay-text d-flex">
                                            <div>
                                                <h5 class="text-white mb-2">Expérimentez la joie de conduire avec le service de Crédit Auto de Salafin.</h5>
                                                <p class="text-white">Que ce soit pour une nouvelle voiture pour des aventures ou un trajet fiable pour les déplacements quotidiens, nous avons ce qu'il vous faut. Demande facile, approbations rapides et options de remboursement flexibles.</p>
                                                <a href="#section_1" class="btn custom-btn mt-2 mt-lg-3">Simulez Maintenant</a>
                                            </div>
                                        </div>
                                        <div class="section-overlay"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


            
            <section class="timeline-section section-padding" id="section_3">
                <div class="section-overlay"></div>
            
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">Comment Pouvez-Vous Bénéficier?</h2>
                        </div>
            
                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="timeline-container">
                                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                    <div class="list-progress">
                                        <div class="inner"></div>
                                    </div>
            
                                    <li>
                                        <h4 class="text-white mb-3">Simulez Votre Crédit</h4>
            
                                        <p class="text-white">Commencez votre parcours en simulant votre demande de crédit. Notre plateforme conviviale vous permet de saisir le montant de crédit souhaité et les modalités de remboursement, vous fournissant des estimations personnalisées adaptées à vos besoins.</p>
            
                                        <div class="icon-holder">
                                            <i class="bi-search"></i>
                                        </div>
                                    </li>
            
                                    <li>
                                        <h4 class="text-white mb-3">Demandez Votre Crédit</h4>
            
                                        <p class="text-white">Une fois que vous avez trouvé l'option de crédit parfaite, demandez-le facilement grâce au processus de demande rapide et simple de Salafin. Profitez d'une expérience sans tracas, et notre équipe examinera votre demande rapidement.</p>
            
                                        <div class="icon-holder">
                                            <i class="bi-bookmark"></i>
                                        </div>
                                    </li>
            
                                    <li>
                                        <h4 class="text-white mb-3">Obtenez le Crédit Dont Vous Avez Besoin</h4>
            
                                        <p class="text-white">Expérimentez la satisfaction de recevoir des approbations rapides et d'obtenir le crédit dont vous avez besoin. Avec des options de remboursement flexibles, vous pouvez gérer confortablement votre crédit et concrétiser vos rêves.</p>
            
                                        <div class="icon-holder">
                                            <i class="bi-book"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
            
                        <div class="col-12 text-center mt-5">
                            <p class="text-white">
                                Vous voulez en savoir plus ?
                                <a href="#" class="btn custom-btn custom-border-btn ms-3">Découvrez ce tutoriel</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>



            <section class="faq-section section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Questions Fréquemment Posées</h2>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-5 col-12">
                            <img src="public/images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                        </div>

                        <div class="col-lg-6 col-12 m-auto">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Combien de temps faut-il pour obtenir une approbation de crédit ?
                                        </button>
                                    </h2>
                        
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Chez Salafin, nous nous efforçons de fournir des approbations de crédit rapides et efficaces. Une fois que vous avez soumis votre demande de crédit en ligne,<strong>notre équipe la examinera rapidement.</strong>  Dans la plupart des cas, vous pouvez vous attendre à recevoir une réponse dans quelques jours ouvrables.
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Est-ce que mes informations personnelles et financières sont en sécurité avec Salafin ?
                                    </button>
                                    </h2>
                        
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Oui, <strong>nous prenons la sécurité de vos informations personnelles et financières très au sérieux</strong>. Chez Salafin, nous utilisons les dernières mesures de sécurité et les technologies de chiffrement pour protéger vos données. Vous pouvez avoir confiance que vos détails sont protégés tout au long du processus de demande de crédit.
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Quels documents sont requis pour faire une demande de crédit chez Salafin ?
                                    </button>
                                    </h2>
                        
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Pour faire une demande de crédit chez Salafin, nous pourrions avoir besoin de quelques documents essentiels à des fins de vérification. Les documents typiques comprennent une <strong>preuve d'identité</strong> (comme une carte d'identité ou un passeport valide), une <strong>preuve de revenus</strong> (comme des fiches de salaire ou des relevés bancaires) et tout autre document justificatif pertinent. Avoir ces documents prêts lors de la demande aidera à accélérer le processus et à assurer une approbation de crédit en douceur0
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        


            <?php include 'contact.php'?>
            
        </main>

        <?php include 'footer.php'?>
        


        <!-- JAVASCRIPT FILES -->
        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/bootstrap.bundle.min.js"></script>
        <script src="public/js/jquery.sticky.js"></script>
        <script src="public/js/click-scroll.js"></script>
        <script src="public/js/custom.js"></script>
    <script>
        
    // JavaScript for tab toggling
    const financeTab = document.getElementById('finance-tab');
    const educationTab = document.getElementById('education-tab');
    const financeTabPane = document.getElementById('finance-tab-pane');
    const educationTabPane = document.getElementById('education-tab-pane');

    financeTab.addEventListener('click', () => {
        financeTab.classList.add('active');
        educationTab.classList.remove('active');
        financeTabPane.classList.add('show', 'active');
        educationTabPane.classList.remove('show', 'active');
    });

    educationTab.addEventListener('click', () => {
        educationTab.classList.add('active');
        financeTab.classList.remove('active');
        educationTabPane.classList.add('show', 'active');
        financeTabPane.classList.remove('show', 'active');
    });
</script>
<script>
// JavaScript for the modal
// Get the modal element
var modal = document.getElementById("myModal");
var simulateButton = document.getElementById("simulateButton");
var startSimulationButton = document.getElementById("startSimulationButton");

// Function to open the modal
function openModal() {
  modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
  modal.style.display = "none";
}

// Function to start the simulation (add your simulation logic here)
function startSimulation() {
  // Add your simulation logic here
  // For example, you could redirect the user to the simulation page or trigger the simulation process.
  // For demonstration purposes, we'll just close the modal.
  closeModal();
}

// Add event listener to the simulate button
simulateButton.addEventListener("click", openModal);


</script>
</body>
</html>
