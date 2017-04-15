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
   public function fetch_word($id)
  {
    # code...

    $query = "SELECT `word_id`, `en_word`, `ar_word` FROM `app_language` WHERE word_id =$id";
     return ($this->database->fetch_query($query));

  }


}

 ?>
