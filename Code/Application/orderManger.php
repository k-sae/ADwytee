
<?php

/**
 *
 */
class orderManger
{
private $file_name = '../../Database/order.php';
private $file_name2 = '../../Application/order.php';
private $order_query;
private $order;
  function __construct()
  {
    try {
   include_once ($this->file_name) ;
   include_once ($this->file_name2) ;
     } catch (Exception $e) {
     echo "error in file name";

  }
  $this->order_query=  new Order_Query();

}
 public function return_order($id)
 {
   $order_result =$this->order_query->fetch_order($id);
   $size = sizeof($order_result);
   if($size !=0){
  for($i =0; $i < $size  ;$i++){
      $this->order[$i] = new Order ();
    $this->order[$i]->setId($order_result[$i]['Id']);
    $this->order[$i]->setPharmacyId($order_result[$i]['PharmacyId']);
    $this->order[$i]->setUserId($id);
    $this->order[$i]->setStatus($order_result[$i]['status']);
    $this->order[$i]->setDate($order_result[$i]['date']);

}

  return ($this->order);
}
else {
  return 0;
}
 }
  public function return_pharmacy($id){
    $order_result =$this->order_query->fetch_pharmacy($id);
    return ($order_result);
  }


public function return_all_pharmacy(){
  $order_result =$this->order_query->fetch_all_pharmacy();
  return ($order_result);
}
 public function checkorder()
 {
   if(isset($_GET["q"])){
    $this->order_query->deleteOrder($_GET["q"]);
   }
 }
 public function addtype()
 {
   $this->order_query->add();
 }

}

if(isset($_GET["q"])){
  $order3 =new orderManger();
  $order3->addtype();
}

 ?>
