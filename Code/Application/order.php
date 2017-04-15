<?php
/**
 *
 */
class Order
{
private $file_name = 'C:\xampp\htdocs\ADwytee\Code\Database/order.php';
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
 public function print_word($id)
 {
   # code...
     return ($this->order->fetch_word($id));
 }
}
 ?>
