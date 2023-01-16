<?php

/***************
 * CONNECT BDD *
 ***************/

$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ganttacha", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/************************************
 * GET INFORMATIONS ABOUT TRAININGS *
 ************************************/

 $trainings = $conn->prepare("SELECT * FROM ganttacha_trainings");
 $trainings->execute();
 $results = $trainings->fetchAll();

 $data = array();

foreach ($results as $result){

  /*****************************
 * REQUEST TO GET THE TRAINER *
 ******************************/

 $trainer = $conn->prepare("SELECT name_trainer FROM ganttacha_trainers WHERE id_trainer=".$result['id_trainer_training']."");
 $trainer->execute();
 $trainer = $trainer->fetch();

   /************************
 * REQUEST TO GET THE CITY *
 **************************/

 $city = $conn->prepare("SELECT name_city FROM ganttacha_cities WHERE id_city=".$result['id_city_training']."");
 $city->execute();
 $city = $city->fetch();

/***********************
 * FILL THE DATA ARRAY * 
 ***********************/

  $data[] = array(
    'label' => $result['name_training'],
    'formateur' => $trainer['name_trainer'],
    'start' => $result['start_training'], 
    'end'   => $result['end_training'],
    'ville' => $city['name_city']
  );
}

/***************************
 * REQUEST TO SAVE TRAINER *
 ***************************/

if(isset($_GET['formerName'])){
  $trainer = $conn->prepare("INSERT INTO ganttacha_trainers (name_trainer) VALUES (?) ");
  $trainer->execute([$_GET['formerName']]);
  header('Location: ./index.php');
}






?>