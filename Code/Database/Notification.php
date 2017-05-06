<?php
/**
 *
 */
class Notification_Query
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

     $this->database = DataBase :: getInstance($this->file_name2);
}
public function check_Notification($id)
{
  $query1 = "SELECT Count(`Id`)FROM NOTIFICATION WHERE `NStatus` = 1 and `patientId` = $id";
  $count = $this->database->fetch_query($query1);

 if($count[0]["Count(`Id`)"] > 0){

    return True;
  }
  else {
    return False;
  }
}
public function get_Notification($id)
{
  $query1 = "SELECT * FROM NOTIFICATION WHERE `NStatus` = 1 and `patientId` = $id";
  $notification = $this->database->fetch_query($query1);

  if(isset($notification)){
    return $notification;

  }
  else {

    return False;
  }
}
}
?>
