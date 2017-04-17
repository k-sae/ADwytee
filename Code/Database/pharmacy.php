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
  {
    # code...
    $query = "SELECT * FROM `pharmacy` WHERE `Phkey` LIKE '123' AND Uid =$id";
  }
}
?>