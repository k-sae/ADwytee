<?php
error_reporting(0);
$livesearch = new livesearch();

class livesearch{

  private $file_name= '../Database/livesearch.php';
  private $livesearch;
  private $q;

  function __construct()
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error in file name";
    }

    $this->livesearch = new livesearch_Query();
    $this->q = $_GET["q"];
    $this->search($this->q);

  }

  public function search($str)
  {

    $result_arr = $this->livesearch->fetch_pharmaces($str);

    if(sizeof($result_arr) != 0){
      for($i=0; $i< sizeof($result_arr) && $i <10; $i++){
	       $result =  $result_arr[$i]['EnName'] . " - " . $result_arr[$i]['ArName'] . "<br>";
        echo $result;
      }
    } else {
      echo "no results found";
    }
    //print_r($result_arr);
    //echo $reselt[0]["Name"];
    //var_dump ($reselt);
  }
}
?>
