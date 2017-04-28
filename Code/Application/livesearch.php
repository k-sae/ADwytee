<?php
error_reporting(0);
$file_name = '../Database/livesearch.php';

try{
  include_once $file_name ;
} catch (Exception $e) {
  echo "error";
}

if(isset($_GET["q"])){

  $q = $_GET["q"];
  search1($q);

}elseif(isset($_GET["m"])){

  $q = $_GET["m"];
  search2($q);
}


function search1($str){

  $livesearch = new livesearch_Query();
  $result_arr = $livesearch->fetch_medicines($str);

  if(sizeof($result_arr) != 0){
    for($i=0; $i< sizeof($result_arr) && $i <10; $i++){
      $result = "<a class='sug' href='resultpage.php?result=" . $result_arr[$i]['EnName'] . "'> <div class='sug'>" . $result_arr[$i]['EnName'] . " - " . $result_arr[$i]['ArName'] . " </div> </a>";
        
      echo $result;
    }
  } else {
      echo "no results found";
  }
}

function search2($str) {

  $livesearch = new livesearch_Query();
  $result_arr = $livesearch->fetch_medicines($str);

  if(sizeof($result_arr) != 0){
    for($i=0; $i< sizeof($result_arr) && $i <10; $i++){
      $result = "<a class='sug' href='addmedicine.php?result=" . $result_arr[$i]['EnName'] . "'> <div class='sug'>" . $result_arr[$i]['EnName'] . " - " . $result_arr[$i]['ArName'] . " </div> </a>";
        
      echo $result;
    }
  } else {
      echo "No medcines were found";
  }
}

?>
