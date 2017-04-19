<?php


class livesearch_Query
{
  private $file_name ='DataBase.php';
  private $database;
  private $file_name2= 'credential.php';
  function __construct()
  {
    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error in file name";
  }

     $this->database = new DataBase($this->file_name2);
  }

  public function fetch_pharmaces($str)
  {

    $query = "SELECT m.ArName, m.EnName FROM `MEDICINE` AS m 
              WHERE m.ArName LIKE '%$str%' OR m.EnName LIKE '%$str%'";
              
    $result = $this->database->fetch_query($query);

    return $result;

  }
}

?>