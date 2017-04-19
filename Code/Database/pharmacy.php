<?php
class Pharmacy_Query
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
  public function fetch_Pharmacy($id,$key)
  { $result=array();
    $query = " SELECT  `Name`, `Notes`, `Describition`, `Longtiude`, `Latitiude`, `Telephone` FROM `PHARMACY` WHERE `Key` LIKE '2' AND `Name` LIKE 'salo7a'";
    $result = $this->database->fetch_query($query);
    return $result;
  }
}
?>