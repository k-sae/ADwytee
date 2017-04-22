<?php
/**
 *
 */
class Order_Query
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
   public function fetch_order($id)
  {
    # code...
    $query = "SELECT `Id`, `PharmacyId`, `date`, `status` FROM `order` WHERE `UserId` = $id ";
    return ($this->database->fetch_query($query));
    }
    public function fetch_pharmacy($id){
        $query = "SELECT `Name` FROM `pharmacy` WHERE `UserId` = $id ";
        return ($this->database->fetch_query($query));
    }
    
}

 ?>
