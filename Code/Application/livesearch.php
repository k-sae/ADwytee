<?php

class livesearch{

  private $file_name= '../../Database/livesearch.php';
  private $livesearch;

  function __construct()
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error in file name";
    }

    $this->livesearch = new livesearch_Query();

  }

  public function search($str){

    return ($this->livesearch->fetch_medicines($str));

  }
}

?>
