<?php
/**
 *
 */
class Order
{
private $file_name = '../../Database/Register.php';
private $order;
  function __construct()
  {
    # code...
    try {
   include_once ($this->file_name) ;
     } catch (Exception $e) {
     echo "error in file name";

    }
  $this->order=  new Order_Query();

  }
}
 ?>
