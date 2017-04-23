<?php
/**
 *
 */
class Order
{
private $file_name = '../../Database/order.php';
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
 public function return_oreder($id)
 {
   # code...
   $order_reselt =$this->order->fetch_order($id);
   if(sizeof($order_reselt) !=0){
  return ($order_reselt);
}
else {
  return 0;
}
 }
  public function return_pharmacy($id){
    $order_reselt =$this->order->fetch_pharmacy($id);
    return ($order_reselt);
  }


public function return_all_pharmacy(){
  $order_reselt =$this->order->fetch_all_pharmacy();
  return ($order_reselt);
}

}
 ?>
