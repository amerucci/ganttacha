<?php

/***************
 * CONNECT BDD *
 ***************/

use function PHPUnit\Framework\isNull;

$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ganttacha", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/******************************
 * START GET ALL THE TRAINERS *
 ******************************/

$alltrainers = $conn->prepare("SELECT * FROM ganttacha_trainers");
$alltrainers->execute();
$resultsAllTrainers = $alltrainers->fetchAll();


/**********************************************
 * START GET ALL THE TRAINERS EXCEPT NO FORMER *
 **********************************************/

 $alltrainers = $conn->prepare("SELECT * FROM ganttacha_trainers WHERE id_trainer !=1");
 $alltrainers->execute();
 $resultsAllTrainerswithout = $alltrainers->fetchAll();

/******************************
 * START GET ALL THE CITIES *
 ******************************/

$allcities = $conn->prepare("SELECT * FROM ganttacha_cities");
$allcities->execute();
$resultsAllCities = $allcities->fetchAll();

/************************************
 * GET INFORMATIONS ABOUT TRAININGS *
 ************************************/

$trainings = $conn->prepare("SELECT * FROM ganttacha_trainings");
$trainings->execute();
$results = $trainings->fetchAll();

$data = array();

foreach ($results as $result) {

  /*****************************
   * REQUEST TO GET THE TRAINER *
   ******************************/

  $trainer = $conn->prepare("SELECT * FROM ganttacha_trainers WHERE id_trainer=" . $result['id_trainer_training'] . "");
  $trainer->execute();
  $trainer = $trainer->fetch();

  /************************
   * REQUEST TO GET THE CITY *
   **************************/

  $city = $conn->prepare("SELECT * FROM ganttacha_cities WHERE id_city=" . $result['id_city_training'] . "");
  $city->execute();
  $city = $city->fetch();

  /***********************
   * FILL THE DATA ARRAY * 
   ***********************/

  $data[] = array(
    'id' => $result['id_training'],
    'label' => $result['name_training'],
    'formateur' => $trainer['name_trainer'],
    'start' => $result['start_training'],
    'end'   => $result['end_training'],
    'ville' => $city['name_city'],
    'idville' => $city['id_city'],
    'ifformer' => $trainer['id_trainer'],
  );
}

/***************************
 * REQUEST TO SAVE TRAINER *
 ***************************/

if (isset($_GET['formerName'])) {
  $trainer = $conn->prepare("INSERT INTO ganttacha_trainers (name_trainer) VALUES (?) ");
  $trainer->execute([$_GET['formerName']]);
  header('Location: ./index.php');
}

/****************************
 * REQUEST TO SAVE TRAINING *
 ****************************/

if (isset($_GET['saveTraining'])) {
  $trainer = $conn->prepare("INSERT INTO ganttacha_trainings (name_training, start_training, 	end_training, id_trainer_training, id_city_training  ) VALUES (?, ?, ?, ?, ?) ");
  $trainer->execute([$_GET['formingName'], $_GET['formingStart'], $_GET['formingEnd'], $_GET['idformer'], $_GET['idcity']]);
  header('Location: ./index.php');
}

/******************************
 * REQUEST TO DELETE THE TRAINER *
 ********************************/

if (isset($_GET['toDelete'])) {

  $training = $conn->prepare("UPDATE ganttacha_trainings
SET id_trainer_training = '1'
WHERE id_trainer_training = ?

");
  $training->execute([$_GET['toDelete']]);

  $trainer = $conn->prepare("DELETE FROM ganttacha_trainers WHERE id_trainer = ?");
  $trainer->execute([$_GET['toDelete']]);
  header('Location: ./index.php');
}
//var_dump($trainerHome);

/*****************************
 * REQUEST TO GET THE TRAINER *
 ******************************/

$trainerHome = $conn->prepare("SELECT id_trainer, name_trainer, name_training, start_training, end_training, name_city FROM ganttacha_trainers LEFT OUTER JOIN ganttacha_trainings ON id_trainer = id_trainer_training LEFT OUTER JOIN ganttacha_cities ON id_city_training = id_city");
$trainerHome->execute();
$trainerHome = $trainerHome->fetchAll();
//var_dump($trainerHome);


/********************
 * FILTERED TRAINER *
 ********************/

if(isset($_GET['formerNameSelected']) && !empty($_GET['formerNameSelected'])){
  $trainerHome = $conn->prepare("SELECT id_trainer, name_trainer, name_training, start_training, end_training, name_city FROM ganttacha_trainers LEFT OUTER JOIN ganttacha_trainings ON id_trainer = id_trainer_training LEFT OUTER JOIN ganttacha_cities ON id_city_training = id_city WHERE name_trainer = ? ORDER BY name_trainer ASC");
  $trainerHome->execute([$_GET['formerNameSelected']]);
  //$trainerHome->debugDumpParams();
  $trainerHome = $trainerHome->fetchAll();
}
else{
  $trainerHome = $conn->prepare("SELECT id_trainer, name_trainer, name_training, start_training, end_training, name_city FROM ganttacha_trainers LEFT OUTER JOIN ganttacha_trainings ON id_trainer = id_trainer_training LEFT OUTER JOIN ganttacha_cities ON id_city_training = id_city ORDER BY name_trainer ASC");
$trainerHome->execute();
$trainerHome = $trainerHome->fetchAll();
}



/************************
 * REQUEST TO SAVE CITY *
 ************************/

if (isset($_GET['trainingCity'])) {
  $trainer = $conn->prepare("INSERT INTO ganttacha_cities (name_city) VALUES (?) ");
  $trainer->execute([$_GET['trainingCity']]);
  header('Location: ./index.php');
}

/******************
 * UPDATE FORMING *
 ******************/

 if (isset($_GET['updateTraining'])) {
  $training = $conn->prepare("UPDATE ganttacha_trainings
SET name_training = ?, start_training = ?, end_training = ?, id_trainer_training = ?, id_city_training = ?
WHERE id_training = ?

");
  $training->execute([$_GET['formingName'], $_GET['formingStart'], $_GET['formingEnd'], $_GET['idformer'], $_GET['idcity'], $_GET['idforming'] ]);
  header('Location: ./index.php');
}

/******************
 * DELETE FORMING *
 ******************/
if (isset($_GET['deleteTraining'])) {
  $trainer = $conn->prepare("DELETE FROM ganttacha_trainings WHERE id_training = ?");
  $trainer->execute([$_GET['idTrainingToDelete']]);
  header('Location: ./index.php');

}