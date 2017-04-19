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
   public function fetch_order($key)
  {
    # code...
    $type_word = $type . "_word"  ;
    $query = "SELECT $type_word FROM `app_language` WHERE word_key like '$key'
    ";
    $result = $this->database->fetch_query($query);
     return ($result["0"][$type_word]);

  }


}

 ?>
