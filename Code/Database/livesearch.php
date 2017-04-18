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

    $query = "SELECT P.Name FROM `PHARMACY`AS P
              INNER JOIN pharmacymedicine AS pm ON p.Phkey = pm.Phkey
              INNER JOIN medicine as m ON (pm.Mcode) = (m.Mcode) AND m.Name LIKE '%$str%'";

    $result = $this->database->fetch_query($query);

    return $result;

  }


}

?>