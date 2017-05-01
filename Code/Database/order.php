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
    $query = "SELECT `Id`, `PharmacyId`, `date`, `status` FROM `ORDER` WHERE `UserId` = $id ";
    return ($this->database->fetch_query($query));
    }
    public function fetch_pharmacy($id){
        $query = "SELECT `Name` FROM `PHARMACY` WHERE `UserId` = $id ";
        return ($this->database->fetch_query($query));
    }
    public function fetch_all_pharmacy(){
        $query = "SELECT `Name` FROM `PHARMACY`";
        return ($this->database->fetch_query($query));
    }
    public function deleteOrder($id)
    {
      $query1 = "SELECT `status` FROM `ORDER` WHERE `Id` = $id";
      $status = $this->database->fetch_query($query1);

      if(isset($status)){

        if($status[0]['status'] == 1){

          $query ="DELETE FROM `ORDER` WHERE `id`=$id";

         $this->database->database_query($query);

          return True;
        }

      }
       return False;
    }
  public function add()
  {
    $query ="INSERT INTO `USERTYPE`( `Type`) VALUES ('m5ns')";
    $this->database->database_query($query);
  }
  public function fetch_order_details($id)
  {
    $query1 = "SELECT `PharmacyId`, `date`, `status` FROM `ORDER` WHERE `Id` = $id";

    return ($this->database->fetch_query($query1));

  }
  public function get_Status($id)
  {
    $query1 = "SELECT `Status` FROM `ORDER_STATUS` WHERE `Id` =$id";
    return ($this->database->fetch_query($query1));
  }
  public function get_medicine_order($id)
  {
  $query1 = " SELECT `MedicineCode`, `Amount` FROM `MEDICINE_ORDER` WHERE `OrderId` =$id ";
  return ($this->database->fetch_query($query1));
  }
  public function get_medicine_name($id)
  {
  $query1 = " SELECT `EnName` FROM `MEDICINE` WHERE `Code` =$id ";
  return ($this->database->fetch_query($query1));
  }
}

 ?>
