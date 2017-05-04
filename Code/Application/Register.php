<?php
/**
 *
 */
class Register
{
private $file_name = '../../Database/Register.php';
  function __construct()
  {
    # code...
    try {
   include_once ($this->file_name) ;
     } catch (Exception $e) {
     echo "error in file name";

    }

  }
}
 ?>
