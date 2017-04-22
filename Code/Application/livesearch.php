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

    $result_arr = $this->livesearch->fetch_medicines($str);

    if(sizeof($result_arr) != 0){
      for($i=0; $i< sizeof($result_arr) && $i <10; $i++){
	       $result = "<a class='sug' href='resultpage.php?result=" . $result_arr[$i]['EnName'] . "'> <div class='sug'>" . $result_arr[$i]['EnName'] . " - " . $result_arr[$i]['ArName'] . " </div> </a>";
        echo $result;
      }
    } else {
      echo "no results found";
    }
  }
}
?>
