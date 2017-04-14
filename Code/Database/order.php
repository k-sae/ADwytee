<?php
/**
 *
 */
class Order_Query
{
  private $file_name ='DataBase.php';
  private $database;
  function __construct()
  {
    try {
   include_once $this->file_name ;
     } catch (Exception $e) {
     echo "error in file name";
   }

     $this->database = new DataBase();
     $this->fech_word(1);

  }
   public function fech_word($id=1)
  {
    # code...

    $query = "SELECT `word_id`, `en_word`, `ar_word` FROM `app_language` WHERE word_id =$id";
    $reselt =$this->database->fetch_query($query);
    var_dump ($reselt);
  }


}

 ?>
