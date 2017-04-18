<?php
/**
 *
 */
class Order
{
private $file_name = '../../DataBase/order.php';
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
 public function print_word($key)
 {
   # code...
  return ($this->order->fetch_word($key,$_SESSION["language"]));
 }
}
 ?>
