<?php
//error_reporting(0);

include_once '../../Application/livesearch.php';
include_once '../../Database/pharmacy.php';

if(isset($_GET["q"])){

  $q = $_GET["q"];
  search1($q);

}elseif(isset($_GET["m"])){

  $m = $_GET["m"];
  search2($m);
}else{
  fetch_Pharmacies();
}

function search1($str){
  include_once 'language.php';
  $livesearch = new livesearch();

  $medcines = $livesearch->search($str);
  
  if(sizeof($medcines) != 0){
    for($i = 0; $i < sizeof($medcines) && $i < 5; $i++){

    	$result = "<a class='sug' href='resultpage.php?result=" . $medcines[$i]['EnName']."&code=" . $medcines[$i]['Code']."'> <div class='sug'>" . $medcines[$i]['EnName'] . " - " . $medcines[$i]['ArName'] . " </div> </a>";

      echo $result;
    }
  } else {
      echo $language['noresults'];
  }
}

function search2($str) {

  $livesearch = new livesearch();
  $result_arr = $livesearch->search($str);

  if(sizeof($result_arr) != 0){
    for($i = 0; $i < sizeof($result_arr) && $i < 5; $i++){
      $result = "<a class='sug' href='addmedicine.php?result=" . $result_arr[$i]['EnName'] . "'> <div class='sug'>" . $result_arr[$i]['EnName'] . " - " . $result_arr[$i]['ArName'] . " </div> </a>";

      echo $result;
    }
  } else {
      echo "No medcines were found";
  }
}

function fetch_Pharmacies(){
  include_once 'language.php';
  $result = new Pharmacy_Query();

  $pharmacies = $result->fetch_Pharmacies();

  if(sizeof($pharmacies) != 0){
    for($i = 0; $i < sizeof($pharmacies); $i++){

      $result = "<option value='".$pharmacies[$i]['UserId']."'>" . $pharmacies[$i]['Name'] . "</option>";

      echo $result;
    }
  } else {
    echo $language['noresults'];
  }
}

?>
