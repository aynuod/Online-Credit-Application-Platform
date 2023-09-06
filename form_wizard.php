<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> </title>
    <!-- CDN (Content Delivery Network) to include the "jquery.steps.css" -->
    <link rel="stylesheet" href="public/css/wizard.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-hardskilled-extend-select@latest/css/select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-hardskilled-extend-select@latest/js/select.min.js"></script>

    <!-- ... other meta tags and styles ... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    
    <!-- SweetAlert library -->
    <script src="node_modules/sweetalert2/src/SweetAlert.js"></script>
<style>
         
        #progressbar {
        overflow: hidden;
        /*CSS counters to number the steps*/
        counter-reset: step;
        text-align: center;
        }
        #progressbar li {
            list-style-type: none;
            /* color: white; */
            text-transform: uppercase;
            font-size: 15px;
            width: 33.33%;
            float: left;
            position: relative;

        }
        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 31px;
            line-height: 29px;
            display: block;
            font-size: 22px;
            color: #333;
            background: #e7e7e7;
            border-radius: 50%;
            margin: 0 auto 5px auto;
        }
        
        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: #0052cc;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }
        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none; 
        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,  #progressbar li.active:after{
            background: #0052cc;
            color: white;
        }
        /*---slider---*/
        .theme-primary #primary .slider-selection {
        background-color: #0052cc; }
        .theme-primary #info .slider-selection {
        background-color: #00baff; }
    .theme-primary #success .slider-selection {
    background-color: #04a08b; }
    .theme-primary #danger .slider-selection {
    background-color: #ff562f; }
    .theme-primary #warning .slider-selection {
    background-color: #ff9920; }
    .wizard-content .wizard {
    width: 100%;
    overflow: hidden; }
    .wizard-content .wizard .content {
        margin-left: 0; }
    .wizard-content .wizard > .steps {
        display: none;
        position: relative;
        width: 100%;
        max-width: 1600px;
        margin: 0 auto;
        z-index: 1; }
        .wizard-content .wizard > .steps .current-info {
        position: absolute;
        left: -99999px; }
        .wizard-content .wizard > .steps > ul {
        display: none;
        width: 100%;
        table-layout: fixed;
        margin: 0;
        padding: 0;
        list-style: none; }
        .wizard-content .wizard > .steps > ul > li {
            display: inline-block;
            width: auto;
            text-align: center;
            position: relative;
            padding: 0.5rem 2.5rem;
            border-radius: 5px;
            margin: 0 10px;
            border: 2px solid #0052cc;
            /* background-color: #0052cc; */
            /* background-color: #f3f6f9;
            border: 2px solid #f3f6f9;  */
        }
        .wizard-content .wizard > .steps > ul > li a {
          position: relative;
          text-decoration: none;
          display: block; }
        .wizard-content .wizard > .steps > ul > li:before {
          left: 0; }
        .wizard-content .wizard > .steps > ul > li:after {
          right: 0; }
        .wizard-content .wizard > .steps > ul > li:first-child:before, .wizard-content .wizard > .steps > ul > li:last-child:after {
          content: none;
          border: 2px solid #060f1c;
          background-color: #060f1c; }
        .wizard-content .wizard > .steps > ul > li.current {
          background-color: #0052cc;
          color: #ffffff; }
          .wizard-content .wizard > .steps > ul > li.current > a {
            color: #ffffff;
            text-decoration: none;
            cursor: default; }
        .wizard-content .wizard > .steps > ul > li.disabled a {
          color: #007bff;
          cursor: default; }
          .wizard-content .wizard > .steps > ul > li.disabled a:hover, .wizard-content .wizard > .steps > ul > li.disabled a:focus {
            color: #1a103a;
            cursor: default; }
        .wizard-content .wizard > .steps > ul > li.done {
          color: #ffffff;
          background-color: #0052cc; }
          .wizard-content .wizard > .steps > ul > li.done a {
            color: #ffffff; }
            .wizard-content .wizard > .steps > ul > li.done a:hover, .wizard-content .wizard > .steps > ul > li.done a:focus {
              color: #ffffff; }
        .wizard-content .wizard > .steps > ul > li.error {
          border-color: #ff562f;
          background-color: red;
          color: #ff562f; }
  .wizard-content .wizard.vertical > .steps {
    display: inline;
    float: left;
    width: 15%; }
    .wizard-content .wizard.vertical > .steps > ul > li {
      display: block;
      width: 100%;
      margin: 10px 0px; }
      .wizard-content .wizard.vertical > .steps > ul > li a {
        margin-top: 0px; }
      .wizard-content .wizard.vertical > .steps > ul > li:before, .wizard-content .wizard.vertical > .steps > ul > li:after {
        background-color: transparent; }
      .wizard-content .wizard.vertical > .steps > ul > li.current:before, .wizard-content .wizard.vertical > .steps > ul > li.current:after {
        background-color: transparent; }
      .wizard-content .wizard.vertical > .steps > ul > li.current ~ li:before, .wizard-content .wizard.vertical > .steps > ul > li.current ~ li:after {
        background-color: transparent; }
  .wizard-content .wizard.vertical.wizard-circle > .steps .step {
    left: 50%;
    width: 50px; }
  .wizard-content .wizard > .content {
    overflow: hidden;
    position: relative;
    width: auto;
    padding: 0;
    margin: 0; }
    .wizard-content .wizard > .content > .title {
      position: absolute;
      left: -99999px; }
    .wizard-content .wizard > .content > .body {
      padding: 20px 20px; }
    .wizard-content .wizard > .content > iframe {
      border: 0;
      width: 100%;
      height: 100%; }
  .wizard-content .wizard > .actions {
    position: relative;
    display: block;
    text-align: right;
    padding: 20px 20px 20px; }
    .wizard-content .wizard > .actions > ul {
      float: right;
      list-style: none;
      padding: 0;
      margin: 0; }
      .wizard-content .wizard > .actions > ul :after {
        content: '';
        display: table;
        clear: both; }
      .wizard-content .wizard > .actions > ul > li {
        float: left; }
        .wizard-content .wizard > .actions > ul > li + li {
          margin-left: 10px; }
        .wizard-content .wizard > .actions > ul > li > a {
          color: #ffffff;
          display: block;
          padding: 7px 12px;
          border-radius: 5px;
          border: 1px solid transparent;
          background-color: #0052cc;
        text-decoration: none; }
          .wizard-content .wizard > .actions > ul > li > a:hover, .wizard-content .wizard > .actions > ul > li > a:active, .wizard-content .wizard > .actions > ul > li > a:focus {
            -webkit-box-shadow: 0 0 0 100px rgba(0, 0, 0, 0.05) inset;
            box-shadow: 0 0 0 100px rgba(0, 0, 0, 0.05) inset; }
          .wizard-content .wizard > .actions > ul > li > a[href="#previous"] {
            background-color: #e7e7e7;;
            color: #234173;
            border: 1px solid #f3f6f9; }
            .wizard-content .wizard > .actions > ul > li > a[href="#previous"]:hover, .wizard-content .wizard > .actions > ul > li > a[href="#previous"]:active, .wizard-content .wizard > .actions > ul > li > a[href="#previous"]:focus {
              
              -webkit-box-shadow: 0 0 0 100px rgba(0, 0, 0, 0.04) inset;
              box-shadow: 0 0 0 100px rgba(0, 0, 0, 0.04) inset; }
        .wizard-content .wizard > .actions > ul > li.disabled > a {
          color: #999999; }
          .wizard-content .wizard > .actions > ul > li.disabled > a:hover, .wizard-content .wizard > .actions > ul > li.disabled > a:focus {
            color: #999999; }
          .wizard-content .wizard > .actions > ul > li.disabled > a[href="#previous"] {
            -webkit-box-shadow: none;
            box-shadow: none; }
            .wizard-content .wizard > .actions > ul > li.disabled > a[href="#previous"]:hover, .wizard-content .wizard > .actions > ul > li.disabled > a[href="#previous"]:focus {
              -webkit-box-shadow: none;
              box-shadow: none; 
              background-color: #eaeaea;
              color: white;
              cursor: not-allowed;}
  .wizard-content .wizard.wizard-circle > .steps > ul > li:before, .wizard-content .wizard.wizard-circle > .steps > ul > li:after {
    top: 45px;
    width: 50%;
    height: 3px; }
  .wizard-content .wizard.wizard-circle > .steps > ul > li.current:after {
    background-color: #f3f6f9; }
  .wizard-content .wizard.wizard-circle > .steps > ul > li.current ~ li:before, .wizard-content .wizard.wizard-circle > .steps > ul > li.current ~ li:after {
    background-color: #f3f6f9; }
  .wizard-content .wizard.wizard-notification > .steps > ul > li:before, .wizard-content .wizard.wizard-notification > .steps > ul > li:after {
    top: 39px;
    width: 50%;
    height: 2px; }
  .wizard-content .wizard.wizard-notification > .steps > ul > li.current .step {
    line-height: 36px; }
  .wizard-content .wizard.wizard-notification > .steps > ul > li.current:after {
    background-color: #f3f6f9; }
  .wizard-content .wizard.wizard-notification > .steps > ul > li.current ~ li:before, .wizard-content .wizard.wizard-notification > .steps > ul > li.current ~ li:after {
    background-color: #f3f6f9; }
  .wizard-content .wizard.wizard-notification > .steps > ul > li.done .step {
    color: #ffffff; }
  .wizard-content .wizard.wizard-notification > .steps .step {
    width: 40px;
    height: 40px;
    line-height: 40px;
    font-size: 1.3rem;
    border-radius: 15%;
    background-color: #f3f6f9; }
    .wizard-content .wizard.wizard-notification > .steps .step:after {
      content: "";
      width: 0;
      height: 0;
      position: absolute;
      bottom: 0;
      left: 50%;
      margin-left: -8px;
      margin-bottom: -8px;
      border-left: 7px solid transparent;
      border-right: 7px solid transparent;
      border-top: 8px solid #f3f6f9; }

    @media (max-width: 1024px) {
    .wizard-content .wizard.wizard-circle > .steps .step {
        width: 50px;
        height: 50px; }
    .wizard-content .wizard > .steps .step {
        left: 50%;
        margin-left: -24px; }
    .wizard-content .wizard.vertical > .steps {
        width: 20%; }
        .wizard-content .wizard.vertical > .steps .step {
      left: 50%; } }
    @media (max-width: 767px) {
    .wizard-content .wizard > .steps > ul {
        margin-bottom: 20px; }
        .wizard-content .wizard > .steps > ul > li {
        display: block;
        float: left;
        width: 50%;
        margin: 5px 0; }
        .wizard-content .wizard > .steps > ul > li > a {
            margin-bottom: 0; }
        .wizard-content .wizard > .steps > ul > li:first-child:before {
            content: ''; }
        .wizard-content .wizard > .steps > ul > li:last-child:after {
            content: ''; }
    .wizard-content .wizard.vertical > .steps {
        width: 30%; } }
    @media (max-width: 575px) {
    .wizard-content .wizard > .steps > ul > li {
        width: 100%; }
    .wizard-content .wizard.vertical > .steps {
        width: 100%;
        float: none; }
        .wizard-content .wizard.vertical > .steps > ul > li {
        display: block;
        float: left;
        width: 100%;
        margin: 5px 0px; } }</style>

</head>
<body>

    <div class="box box-default" >
                <div class="box-header">
                <!-- <div class="logo-container">
                    <img src="./../public/images/salafin-removebg.png" alt="salafin">
                </div> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body wizard-content">
                    <form action="" class="validation-wizard wizard-circle" method="post" enctype="multipart/form-data">
                        <!-- Step 1 -->
                        <li class="step-item" data-index="1"></li> 
                        <ul id="progressbar">
                            <li id="progressbar"class="active" data-index="1">Vos informations</li>
                            <li data-index="2">Votre situation</li>
                            <li data-index="3">Vos pieces</li>
                        </ul>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom"> Nom : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control " id="wfirstName2" name="nom"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prenom"> Prenom : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control " id="wlastName2" name="prenom"> </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label for="cin"> CIN : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control " id="cin" name="cin"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tel">Telephone : <span class="danger">*</span></label>
                                        <input type="tel" class="form-control  " id="tel" name="tel"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mail"> Email : <span class="danger">*</span> </label>
                                        <input type="email" class="form-control " id="wemailAddress2" name="mail"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pwd">Mot de passe :</label>
                                        <input type="password" class="form-control " id="pwd" name="pwd"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label for="ville"> Région : <span class="danger">*</span> </label>
                                        <select class="form-control" data-live-search="true" id="selectVilles" name="ville">
                                     </select>                                           
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date de naissance : <span class="danger">*</span></label>
                                        <input type="date" class="form-control  " id="dob" name="dob"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">Code postal : <span class="danger">*</span></label>
                                        <input type="code" class="form-control  " id="code" name="code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adresse">Adresse : <span class="danger">*</span></label>
                                        <textarea name="adresse" id="adresse" rows="1" class="form-control "></textarea>
                                    </div>
                                </div>
                
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <li class="step-item" data-index="2"></li>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profession"> Profession :</label>
                                        <input type="text" class="form-control  " id="profession" name="profession">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="secActivite">Secteur d'activité :</label>
                                        <select id="basic-live" class="form-control" data-live-search="true" id="secActivite" name="secActivite">
                                            <option value="" selected disabled>- Sélectionner -</option>
                                            <optgroup label="Administration-Fonction Publique">
                                                <option value="- Agences Nationales">- Agences Nationales</option>
                                                <option value="- Caisses Publiques">- Caisses Publiques</option>
                                                <option value="- Centres, Instituts & Établissements publics">- Centres, Instituts & Établissements publics</option>
                                                <option value="- Hauts Commissariats">- Hauts Commissariats</option>
                                                <option value="- Ministères">- Ministères</option>
                                                <option value="- Offices publics">- Offices publics</option>
                                                <option value="- Sécurités">- Sécurités</option>
                                                <option value="- Sociétés & Organismes publics">- Sociétés & Organismes publics</option>
                                                <option value="- Autres administrations">- Autres administrations</option>
                                                <option value="- Divers">- Divers</option>
                                            </optgroup>
                                            <optgroup label="Agriculture-Pêche">
                                                <option value="- Agriculture-Pêche">- Agriculture-Pêche</option>
                                            </optgroup>
                                            <optgroup label="Artisanat">
                                                <option value="- Équipement technique et électrique - Artisanat">- Équipement technique et électrique - Artisanat</option>
                                                <option value="- Gros œuvre - Artisanat">- Gros œuvre - Artisanat</option>
                                                <option value="- Second œuvre, Finition - Artisanat">- Second œuvre, Finition - Artisanat</option>
                                            </optgroup>
                                            <optgroup label="Commerce">
                                                <option value="- Autre Commerce">- Autre Commerce</option>
                                                <option value="- Commerce Alimentaire de Détail">- Commerce Alimentaire de Détail</option>
                                                <option value="- Commerce Habillement & Equipement">- Commerce Habillement & Equipement</option>
                                                <option value="- Edition">- Edition</option>
                                            </optgroup>
                                            <optgroup label="Industrie">
                                                <option value="- Autres Industries">- Autres Industries</option>
                                                <option value="- Industrie Agroalimentaire">- Industrie Agroalimentaire</option>
                                                <option value="- Industrie Chimique">- Industrie Chimique</option>
                                                <option value="- Textile">- Textile</option>
                                            </optgroup>
                                            <optgroup label="Santé-Secteur Privé">
                                                <option value="- Autre Santé Secteur Privé">- Autre Santé Secteur Privé</option>
                                                <option value="- Industrie de Santé">- Industrie de Santé</option>
                                                <option value="- Professions libérales liées à la Santé">- Professions libérales liées à la Santé</option>
                                                <option value="- Commerce de santé">- Commerce de santé</option>
                                            </optgroup>
                                            <optgroup label="Services">
                                                <option value="- Activités Financières">- Activités Financières</option>
                                                <option value="- Autre Services">- Autre Services</option>
                                                <option value="- Communication">- Communication</option>
                                                <option value="- Études - Conseil">- Études - Conseil</option>
                                                <option value="- Prestataire">- Prestataire</option>
                                                <option value="- Offshoring">- Offshoring</option>
                                                <option value="- Services aux Particuliers">- Services aux Particuliers</option>
                                                <option value="- Services aux Entreprises">- Services aux Entreprises</option>
                                                <option value="- Transport">- Transport</option>
                                            </optgroup>
                                            <optgroup label="Tourisme- Hôtellerie- Restauration- Loisirs">
                                                <option value="- Agence de voyage">- Agence de voyage</option>
                                                <option value="- Location de voitures">- Location de voitures</option>
                                                <option value="- Hôtels">- Hôtels</option>
                                                <option value="- Transport de Tourisme">- Transport de Tourisme</option>
                                                <option value="- Autres">- Autres</option>
                                            </optgroup>
                                        </select>

                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="salaire">Salaire par mois :</label>
                                        <div class="input-group-append">
                                            <input type="number" class="form-control " id="salaire" name="salaire">
                                            <span class="input-group-text">DH/mois</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doj">Date d'activite:</label>
                                        <input type="date" class="form-control " id="dow" name="dow">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 3 -->
                        <li class="step-item" data-index="3"></li>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="wjobTitle4">Copie CIN :</label>

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cinFile" name="cinFile" onchange="updateFileNameLabel('cinFileLabel', this)">
                                            <label class="custom-file-label" id="cinFileLabel" for="cinFile">Choisissez fichier</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="wjobTitle4">Spécimen de chèque :</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="checFile" name="checFile" onchange="updateFileNameLabel('checFileLabel', this)">
                                            <label class="custom-file-label"  id="checFileLabel" for="checFile">Choisissez fichier</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="wjobTitle4">Attestation de travail :</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="workFile" name="workFile" onchange="updateFileNameLabel('workFileLabel', this)">
                                            <label class="custom-file-label" id="workFileLabel" for="workFileLabel">Choisissez fichier</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="wjobTitle4">Attestation de CNSS :</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cnssFile" name="cnssFile" onchange="updateFileNameLabel('cnssFileLabel', this)">
                                            <label class="custom-file-label" id="cnssFileLabel" for="cnssFileLabel">Choisissez fichier</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="wjobTitle4">Dernier bulletin de paie :</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="paieFile" name="paieFile" onchange="updateFileNameLabel('paieFileLabel', this)">
                                            <label class="custom-file-label" id="paieFileLabel" for="paieFile">Choisissez fichier</label>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="wjobTitle4">Quittance Electricité ou tél fixe :</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fixeFile" name="fixeFile" onchange="updateFileNameLabel('fixeFileLabel', this)">
                                            <label class="custom-file-label" id="fixeFileLabel" for="fixeFile">Choisissez fichier</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
</div>


<script>

const dobInput = document.getElementById('dob');
const maxDate = new Date('2002-12-31').toISOString().split('T')[0];
dobInput.setAttribute('max', maxDate);

// Add custom validation method for Moroccan phone number with 10 digits
$.validator.addMethod("moroccanPhoneNumber", function(value, element) {
    return this.optional(element) || /^0[567][0-9]{8}$/.test(value);
}, "Veuillez entrer un numéro de téléphone marocain valide.");

var form = $(".validation-wizard").show();
var totalSteps = $(".validation-wizard").find(".step-item").length;

$(".validation-wizard").steps({
    stepsContainer: "#progressbar",
    headerTag: "li"
    , bodyTag: "section"
    , transitionEffect: "none"
    , titleTemplate: '<span class="step">#index#</span>'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    ,
    onStepChanged: function (event, currentIndex, priorIndex) {
        // Update the active class for the progress bar based on the current step
        $("#progressbar li").removeClass("active");
        $("#progressbar li[data-index='" + (currentIndex + 1) + "']").addClass("active");
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }   
    , onFinished: function (event, currentIndex) {
        var cinFile = $('#cinFile').prop('files')[0];
        var checFile = $('#checFile').prop('files')[0];
        var workFile = $('#workFile').prop('files')[0];
        var cnssFile = $('#cnssFile').prop('files')[0];
        var paieFile = $('#paieFile').prop('files')[0];
        var fixeFile = $('#fixeFile').prop('files')[0];

        var wizardData = $(".validation-wizard").serialize();
        var formData = new FormData();
        formData.append('cinFile', cinFile);
        formData.append('checFile', checFile);
        formData.append('workFile', workFile);
        formData.append('cnssFile', cnssFile);
        formData.append('paieFile', paieFile);
        formData.append('fixeFile', fixeFile);
         

        // Submit the form using AJAX
        $.ajax({
        type: "POST",
        url: "controllers/upload.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (uploadResponse) {
           
                $.ajax({
                    type: "POST",
                    url: "controllers/register.php",
                    data: wizardData,
                    dataType: "json",
                    beforeSend: function() {
                        swal.fire({
                            title:"Veuillez patienter", 
                            text:"Loading...",
                            html: "<img src='https://www.boasnotas.com/img/loading2.gif' style='width: 50px; height: 50px;'>",
                            showConfirmButton: false
                            //, onBeforeOpen: () => {
                            //     Swal.showLoading();
                            // }
                        });
                    },
                    
                    success: function (response) {
                        console.log("success");
                        console.log(response.message);
                
                        if (response.success) {
                            // Display success message using SweetAlert
                            Swal.fire({
                                title: "Félicitations !",
                                text: "Nous vous avons envoyé un lien de vérification à votre adresse e-mail.",
                                icon: "success"
                            }).then(function () {
                                window.location.href = "login.php";
                            });
                        } else {
                            // Display error message using SweetAlert
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                    // Handle any errors that occurred during form submission
                    try {
                        console.log("ERROOOR");
 
                        console.log("AJAX Error:", error);
                         console.log("Response Text:", xhr.responseText);
                        Swal.fire({
                                title: "Error!",
                                text: "Une erreur est survenue lors de la soumission du formulaire.",
                                icon: "error"
                            });
                    } catch (parseError) {
                        // Handle parsing error (e.g., response is not valid JSON)
                        console.log(xhr.responseText); 
                        console.error("Error parsing response:", parseError);
                        Swal.fire({
                            title: "Error!",
                            text: "Une erreur 2  est survenue lors de la soumission du formulaire.",
                            icon: "error"
                        });
                    }
                }

                });
           
            },
            error: function (uploadXhr, uploadStatus, uploadError) {
            // Handle any errors that occurred during form submission
                Swal.fire({
                        title: "Félicitations !",
                        text: "Votre demande a été soumise avec succès. Vous pouvez accéder à votre tableau de bord pour la suivre",
                        icon: "success"
                    });
            }
         });
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    ,onkeyup: false // Disable immediate validation on keyup
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        },
        pwd: {
            required: true, // Password field is required
            minlength: 5, // Minimum length of 5 characters
        },
        tel: {
            moroccanPhoneNumber: true // Custom rule for Moroccan phone number
        }
    },
    messages: {
        pwd: {
            minlength: "Le mot de passe est faible."       
         },
        tel: {
            moroccanPhoneNumber: "Téléphone marocain non valide."
        }
    }
});


$(document).ready(function() {
    const selectVilles = $("#selectVilles");

    // Requête AJAX pour charger les données des villes depuis un fichier JSON
    $.getJSON("dataJson/villes.json", function(data) {
        // Parcours des données pour ajouter les options au select
        data.forEach(function(villeData) {
            selectVilles.append(`<option value="${villeData.ville}">${villeData.ville}</option>`);
        });
    });
});
</script>
<script>
    function updateFileNameLabel(labelId, fileInput) {
        // Get the label element
        const label = document.getElementById(labelId);

        // Get the name of the selected file
        const fileName = fileInput.files[0]?.name || 'Choisissez fichier';

        // Update the label text
        label.innerText = fileName;
    }
</script>


</body>

</html>