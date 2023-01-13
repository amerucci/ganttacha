<?php

/***************
 * CONNECT BDD *
 ***************/

$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ganttacha", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
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

var_dump($data);




// $data[] = array(
//   'label' => 'SAMS',
//   'formateur' => '',
//   'start' => '2022-11-21', 
//   'end'   => '2023-05-24',
//   'ville' => 'Lons le Saunier'
// );

// $data[] = array(
//   'label' => 'MTI',
//   'formateur' => 'Laurent Ricard',
//   'start' => '2022-11-21', 
//   'end'   => '2023-02-10',
//   'ville' => 'Lons le Saunier'
// );

// $data[] = array(
//   'label' => 'COMPÉTENCES-TR + CODE ROUTE',
//   'formateur' => 'Laurent Ricard',
//   'start' => '2022-12-12', 
//   'end'   => '2023-02-23',
//   'ville' => 'Saint-Claude'
// );

// $data[] = array(
//   'label' => 'GEST-COMPT',
//   'formateur' => '',
//   'start' => '2022-10-24', 
//   'end'   => '2023-04-06',
//   'ville' => 'Dole'
// );




//var_dump($data);
// $data[] = array(
//   'label' => 'Project 4',
//   'start' => '2012-05-06', 
//   'end'   => '2012-06-17',
//   'class' => 'important',
// );
?>