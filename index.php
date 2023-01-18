<?php

require('lib/gantti.php');
require('data.php');

date_default_timezone_set('UTC');
setlocale(LC_ALL, 'en_US');

$gantti = new Gantti($data, array(
  'title'      => 'GanTTacha',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Dashboard Template · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="styles/css/gantti.css" />
  <link rel="stylesheet" href="styles/css/screen.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />




  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="assets/dashboard.css" rel="stylesheet">
</head>

<body>

  <!-- <input type="hidden" id="test" value="<?php echo json_encode($resultsAllTrainers); ?>"> -->
  <input type="hidden" id="myText" value='<?php echo json_encode($resultsAllTrainers); ?>'>
  <input type="hidden" id="resultsAllCities" value='<?php echo json_encode($resultsAllCities); ?>'>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">GanTTacha</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item" id="addTraining" data-title="Ajouter une formation">

              <span data-feather="home" class=" nav-link align-text-bottom"></span>
              Ajouter une formation

            </li>
            <li class="nav-item" id="addTrainer" data-title="Ajouter un formateur">

              <span data-feather="file" class="align-text-bottom"></span>
              Ajouter un formateur

            </li>
            <li class="nav-item" id="addCity" data-title="Ajouter une ville">

              <span data-feather="file" class="align-text-bottom"></span>
              Ajouter une ville

            </li>
          </ul>


        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Toutes les formations</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar" class="align-text-bottom"></span>
              This week
            </button>
          </div>
        </div>


        <?php echo $gantti ?>


        <h2>Tous les formateurs</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Formation en cours</th>
                <th scope="col">Ville</th>
                <th scope="col">Debut</th>
                <th scope="col">Fin</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>


              <?php foreach ($trainerHome as $tH) {
                if ($tH['id_trainer'] != "1") {
                  echo "<tr>";
                  echo "<td>" . $tH["name_trainer"] . "</td>";
                  echo "<td>" . $tH["name_training"] . "</td>";
                  echo "<td>" . $tH["name_city"] . "</td>";
                  echo "<td>" . $tH["start_training"] . "</td>";
                  echo "<td>" . $tH["end_training"] . "</td>";
                  echo '<td><span class="material-symbols-outlined deleteBtn" data-id="' . $tH['id_trainer'] . '" data-name_former="' . $tH['name_trainer'] . '">delete</span></td>';
                  echo "</tr>";
                }
              }


              ?>



            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>



  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <h2 id="modalTitle">Modal Title</h2>
      <span class="close">&times;</span>
      <div id="modalContent">
        <form id="modalForm">

        </form>
      </div>
    </div>

  </div>

  <script>
    let allFormers = document.getElementById("myText").value;
    let allFormersArray = JSON.parse(allFormers);

    let allCities = document.getElementById("resultsAllCities").value;
    let allCitiesArray = JSON.parse(allCities);
    


    // Get the modal
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("addTraining");
    var span = document.getElementsByClassName("close")[0];

    //Function when clickin on addin training
    document.querySelector("#addTraining").addEventListener("click", function() {
      //alert(document.getElementById("addTraining").getAttribute('data-title'))
      modal.style.display = "block";
      document.querySelector("#modalTitle").innerHTML = document.getElementById("addTraining").getAttribute('data-title')
      let form = document.querySelector("#modalForm")
      let divTitle = document.createElement('div');
      divTitle.className = "mb-3"

      //LABEL INPUT NAME TRAINING
      let labelInputNameFormer = document.createElement('label');
      labelInputNameFormer.setAttribute('for', 'inputNameForming')
      labelInputNameFormer.setAttribute('class', 'form-label')
      labelInputNameFormer.innerText = "Nom de la formation"

      //INPUT NAME TRAINING
      let inputNameFormer = document.createElement('input');
      inputNameFormer.setAttribute('type', 'text');
      inputNameFormer.setAttribute('id', 'inputNameForming');
      inputNameFormer.setAttribute('class', 'form-control');
      inputNameFormer.setAttribute('name', 'formingName');
      inputNameFormer.setAttribute('placeholder', 'Nom de la formation');
      inputNameFormer.required = true

      //LABEL INPUT START TRAINING
      let labelInputStart = document.createElement('label');
      labelInputStart.setAttribute('for', 'inputStart')
      labelInputStart.setAttribute('class', 'form-label')
      labelInputStart.innerText = "Date de début de formation"

      //INPUT START TRAINING
      let inputStart = document.createElement('input');
      inputStart.setAttribute('type', 'date');
      inputStart.setAttribute('id', 'inputStart');
      inputStart.setAttribute('class', 'form-control');
      inputStart.setAttribute('name', 'formingStart');
      inputStart.required = true

      //LABEL INPUT START TRAINING
      let labelInputEnd = document.createElement('label');
      labelInputEnd.setAttribute('for', 'inputEnd')
      labelInputEnd.setAttribute('class', 'form-label')
      labelInputEnd.innerText = "Date de fin de formation"

      //INPUT START TRAINING
      let inputEnd = document.createElement('input');
      inputEnd.setAttribute('type', 'date');
      inputEnd.setAttribute('id', 'inputEnd');
      inputEnd.setAttribute('class', 'form-control');
      inputEnd.setAttribute('name', 'formingEnd');
      inputEnd.required = true

      //LABEL INPUT SELECT FORMER TRAINING
      let labelSelectFormerTraining = document.createElement('label');
      labelSelectFormerTraining.setAttribute('for', 'SelectFormerTraining')
      labelSelectFormerTraining.setAttribute('class', 'form-label')
      labelSelectFormerTraining.innerText = "Formateur"

      //INPUT SELECT FORMER TRAINING
      let SelectFormerTraining = document.createElement('select');
      SelectFormerTraining.setAttribute('id', 'SelectFormerTraining');
      SelectFormerTraining.setAttribute('class', 'form-select');
      SelectFormerTraining.setAttribute('name', 'idformer');
      SelectFormerTraining.required = true

      //INPUT SELECT FORMER TRAINING

      allFormersArray.forEach(former => {
        let optionFormerTraining = document.createElement('option');
        optionFormerTraining.value = former['id_trainer']
        optionFormerTraining.text = former['name_trainer']
        SelectFormerTraining.appendChild(optionFormerTraining)
      });

      //LABEL INPUT SELECT CITY TRAINING
      let labelSelectCityTraining = document.createElement('label');
      labelSelectCityTraining.setAttribute('for', 'SelectCityTraining')
      labelSelectCityTraining.setAttribute('class', 'form-label')
      labelSelectCityTraining.innerText = "Formateur"

      //INPUT SELECT CITY TRAINING
      let SelectCityTraining = document.createElement('select');
      SelectCityTraining.setAttribute('id', 'SelectCityTraining');
      SelectCityTraining.setAttribute('class', 'form-select');
      SelectCityTraining.setAttribute('name', 'idcity');
      SelectCityTraining.required = true

      //INPUT SELECT CITY TRAINING

      allCitiesArray.forEach(city => {
        let optionCityTraining = document.createElement('option');
        optionCityTraining.value = city['id_city']
        optionCityTraining.text = city['name_city']
        SelectCityTraining.appendChild(optionCityTraining)
      });


      //INPUT SUBMIT BUTTON
      let submitNameFormer = document.createElement('button')
      submitNameFormer.setAttribute('class', 'btn btn-primary')
      submitNameFormer.setAttribute('type', 'submit')
      submitNameFormer.setAttribute('name', 'saveTraining')
      submitNameFormer.setAttribute('value', 'true')
      submitNameFormer.innerText = 'Ajouter la formation'


      divTitle.appendChild(labelInputNameFormer)
      divTitle.appendChild(inputNameFormer)
      divTitle.appendChild(labelInputStart)
      divTitle.appendChild(inputStart)
      divTitle.appendChild(labelInputEnd)
      divTitle.appendChild(inputEnd)

      divTitle.appendChild(labelSelectFormerTraining)
      divTitle.appendChild(SelectFormerTraining)
      divTitle.appendChild(labelSelectCityTraining)
      divTitle.appendChild(SelectCityTraining)

      form.appendChild(divTitle)
      form.appendChild(submitNameFormer)
    })
    //Function when clickin on addin trainer
    document.querySelector("#addTrainer").addEventListener("click", function() {
      //alert(document.getElementById("addTraining").getAttribute('data-title'))
      modal.style.display = "block";
      document.querySelector("#modalTitle").innerHTML = document.getElementById("addTrainer").getAttribute('data-title')
      let form = document.querySelector("#modalForm")
      let divTitle = document.createElement('div');
      divTitle.className = "mb-3"

      //LABEL INPUT NAME FORMER
      let labelInputNameFormer = document.createElement('label');
      labelInputNameFormer.setAttribute('for', 'inputNameFormerId')
      labelInputNameFormer.setAttribute('class', 'form-label')
      labelInputNameFormer.innerText = "Formateur"

      //INPUT NAME FORMER
      let inputNameFormer = document.createElement('input');
      inputNameFormer.setAttribute('type', 'text');
      inputNameFormer.setAttribute('id', 'inputNameFormerId');
      inputNameFormer.setAttribute('class', 'form-control');
      inputNameFormer.setAttribute('name', 'formerName');
      inputNameFormer.required = true

      //INPUT NAME FORMER EXPLAINATION
      // <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      let helpNameFormer = document.createElement('div');
      helpNameFormer.setAttribute('class', 'form-text')
      helpNameFormer.setAttribute('id', 'inputNameFormer-help')
      helpNameFormer.innerText = "Saisir le prénom et nom du formateur"

      //INPUT SUBMIT BUTTON
      let submitNameFormer = document.createElement('button')
      submitNameFormer.setAttribute('class', 'btn btn-primary')
      submitNameFormer.setAttribute('type', 'submit')
      submitNameFormer.setAttribute('name', 'saveFormer')
      submitNameFormer.setAttribute('value', 'true')
      submitNameFormer.innerText = 'Soumettre le formateur'


      divTitle.appendChild(labelInputNameFormer)
      divTitle.appendChild(inputNameFormer)
      divTitle.appendChild(helpNameFormer)
      form.appendChild(divTitle)
      form.appendChild(submitNameFormer)

    })


    //Function when clickin on adding city
    document.querySelector("#addCity").addEventListener("click", function() {
      //alert(document.getElementById("addTraining").getAttribute('data-title'))
      modal.style.display = "block";
      document.querySelector("#modalTitle").innerHTML = document.getElementById("addCity").getAttribute('data-title')
      let form = document.querySelector("#modalForm")
      let divTitle = document.createElement('div');
      divTitle.className = "mb-3"

      //LABEL INPUT NAME CITY
      let labelInputNameFormer = document.createElement('label');
      labelInputNameFormer.setAttribute('for', 'inputNameFormerId')
      labelInputNameFormer.setAttribute('class', 'form-label')
      labelInputNameFormer.innerText = "Ville"

      //INPUT NAME CITY
      let inputNameFormer = document.createElement('input');
      inputNameFormer.setAttribute('type', 'text');
      inputNameFormer.setAttribute('id', 'inputNameFormerId');
      inputNameFormer.setAttribute('class', 'form-control');
      inputNameFormer.setAttribute('name', 'trainingCity');
      inputNameFormer.required = true

      //INPUT NAME CITY EXPLAINATION
      // <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      let helpNameFormer = document.createElement('div');
      helpNameFormer.setAttribute('class', 'form-text')
      helpNameFormer.setAttribute('id', 'inputNameFormer-help')
      helpNameFormer.innerText = "Ville de la formation"

      //INPUT SUBMIT BUTTON
      let submitNameFormer = document.createElement('button')
      submitNameFormer.setAttribute('class', 'btn btn-primary')
      submitNameFormer.setAttribute('type', 'submit')
      submitNameFormer.setAttribute('name', 'saveCity')
      submitNameFormer.setAttribute('value', 'true')
      submitNameFormer.innerText = 'Créer la ville'

      divTitle.appendChild(labelInputNameFormer)
      divTitle.appendChild(inputNameFormer)
      divTitle.appendChild(helpNameFormer)
      form.appendChild(divTitle)
      form.appendChild(submitNameFormer)

    })

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
      //Erase content
      document.querySelector("#modalForm").innerHTML = ""
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        //Erase content
        document.querySelector("#modalForm").innerHTML = ""
      }
    }

    //DELETING FORMER
    let deleteBtns = document.querySelectorAll('.deleteBtn')
    console.log(deleteBtns)
    deleteBtns.forEach(element => {
      element.addEventListener('click', function() {
        modal.style.display = "block";
        document.querySelector("#modalTitle").innerHTML = 'Suppression'
        let form = document.querySelector("#modalForm")
        let divTitle = document.createElement('div');
        divTitle.className = "mb-3"
        let divMessage = document.createElement('div')
        divMessage.setAttribute('class', 'alert alert-danger')
        divMessage.innerHTML = "Attention vous êtes sur le point de supprimer le formateur<br/><b> " + element.getAttribute('data-name_former') + "</b>"

        //INTERACTION BUTTON
        let interractionButtons = document.createElement('div');
        interractionButtons.className = "mb-2"
        let cancelButton = document.createElement('button')
        cancelButton.setAttribute('type', 'button')
        cancelButton.setAttribute('class', 'btn btn-light')
        cancelButton.textContent = "Annuler"
        cancelButton.addEventListener('click', function() {
          modal.style.display = "none"
          document.querySelector("#modalForm").innerHTML = ""
        })

        let confirmButton = document.createElement('button')
        confirmButton.setAttribute('type', 'submit')
        confirmButton.setAttribute('class', 'btn btn-danger ms-3')
        confirmButton.setAttribute('name', 'toDelete')
        confirmButton.textContent = "Confirmer"
        confirmButton.value = element.getAttribute('data-id')



        form.appendChild(divMessage)
        interractionButtons.appendChild(cancelButton)
        interractionButtons.appendChild(confirmButton)
        form.appendChild(interractionButtons)
        form.appendChild(divTitle)
        form.appendChild(submitNameFormer)

      })

    });
  </script>

  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>