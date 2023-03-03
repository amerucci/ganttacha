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
  <input type="hidden" id="resultsAllInterventions" value='<?php echo json_encode($resultsAllinterventions); ?>'>
  <input type="hidden" id="resultsAllSpeakers" value='<?php echo json_encode($resultsAllSpeakers); ?>'>
  <input type="hidden" id="resultsAllFormings" value='<?php echo json_encode($data); ?>'>

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

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
              <span>Formations</span>
            </h6>

            <li class="nav-item px-3 pt-3" id="addTraining" data-title="Ajouter une formation" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
              </svg>
              <span>Ajouter une formation</span>

            </li>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
              <span>Formateurs</span>
            </h6>

            <li class="nav-item px-3 pt-3" id="addTrainer" data-title="Ajouter un formateur">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
              </svg>
              <span>Ajouter un formateur</span>

            </li>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
              <span>Villes</span>
            </h6>

            <li class="nav-item px-3 pt-3" id="addCity" data-title="Ajouter une ville">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
              </svg>
              <span>Ajouter une ville</span>

            </li>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
              <span>Interventions</span>
            </h6>

            <li class="nav-item px-3 pt-3" id="addIntervention" data-title="Ajouter une intervention" class="">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
              </svg>
              <span>Ajouter une intervention</span>

            </li>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
              <span>Intervenants</span>
            </h6>
            <li class="nav-item px-3 pt-3" id="addSpeaker" data-title="Ajouter un intervenant">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
              </svg>
              <span>Ajouter un intervenant</span>

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

        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#formateurs">Fomateurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#intervenants">Intervenants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#interventions">Inteventions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#villes">Villes</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container active" id="formateurs">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2>Tous les formateurs</h2>
              <div class="searchformer">
                <form action="" method="get">
                  <label for="exampleDataList" class="form-label">Filtrer par formateur</label>
                  <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Nom du formateur..." name="formerNameSelected">
                  <datalist id="datalistOptions">
                    <?php var_dump(($alltrainers)); ?>
                    <?php foreach ($resultsAllTrainerswithout as $oneformer) {
                      echo '<option value="' . $oneformer['name_trainer'] . '">';
                    }
                    ?>


                  </datalist>
                  <button type="submit" name="filterByName" value="true">Filtrer</button>
                </form>

              </div>

            </div>
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
          </div>


          <!-- TOUS LES INTERVENANTS -->
          <div class="tab-pane container fade" id="intervenants">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2>Tous les intervenants</h2>
              <div class="searchformer">
                <form action="" method="get">
                  <label for="exampleDataList" class="form-label">Filtrer par formateur</label>
                  <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Nom du formateur..." name="formerNameSelected">
                  <datalist id="datalistOptions">
                    <?php var_dump(($alltrainers)); ?>
                    <?php foreach ($resultsAllTrainerswithout as $oneformer) {
                      echo '<option value="' . $oneformer['name_trainer'] . '">';
                    }
                    ?>


                  </datalist>
                  <button type="submit" name="filterByName" value="true">Filtrer</button>
                </form>

              </div>

            </div>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>


                  <?php foreach ($resultsAllSpeakers as $tH) {
                    if ($tH['id_trainer'] != "1") {
                      echo "<tr>";
                      echo "<td>" . $tH["name_speaker"] . "</td>";
                      echo "<td></td>";
                      echo "<td></td>";
                      echo "<td></td>";
                      echo "<td></td>";
                
                      echo '<td><span class="material-symbols-outlined deleteBtn" data-id="' . $tH['id_trainer'] . '" data-name_former="' . $tH['name_trainer'] . '">delete</span></td>';
                      echo "</tr>";
                    }
                  }


                  ?>



                </tbody>
              </table>
            </div>
          </div>
          <!-- ALL INTERVENTIONS -->
          <div class="tab-pane container fade" id="interventions">


          <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Formation</th>
                    <th scope="col">Intervenant</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($resultsAllinterventions as $tH) {
                    if ($tH['id_trainer'] != "1") {
                      echo "<tr>";
                      echo "<td>" . $tH["name_intervention"] . "</td>";
                      echo "<td>" . $tH["name_training"] . "</td>";
                      echo "<td>" . $tH["name_speaker"] . "</td>";
                      echo "<td>" . $tH["start_intervention"] . "</td>";
                      echo "<td>" . $tH["end_intervention"] . "</td>";
                
                      echo '<td><span class="material-symbols-outlined deleteBtn" data-id="' . $tH['id_trainer'] . '" data-name_former="' . $tH['name_trainer'] . '">delete</span></td>';
                      echo "</tr>";
                    }
                  }


                  ?>



                </tbody>
              </table>
            </div>

          </div>
          <div class="tab-pane container fade" id="villes">...</div>
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



  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/dist/js/apps.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
</body>

</html>