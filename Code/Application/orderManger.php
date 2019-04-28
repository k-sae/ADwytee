<?php
/**
 *
 */
class orderManger
{
private $file_name = '../../Database/order.php';
private $file_name2 = '../../Application/order.php';
private $file_name3 = '../../Application/medicineOrder.php';
private $order_query;
private $order;
  function __construct()
  {
    try {
   include_once ($this->file_name) ;
   include_once ($this->file_name2) ;
   include_once ($this->file_name3) ;
     } catch (Exception $e) {
     echo "error in file name";

  }
  $this->order_query=  new Order_Query();

}
 public function return_order_pharmacy($id)
 {
   $order_result =$this->order_query->fetch_order_pharmacy($id);
   $size = sizeof($order_result);
   if($size !=0){
  for($i =0; $i < $size  ;$i++){
    $this->order[$i] = new Order ();
    $this->order[$i]->setId($order_result[$i]['Id']);
    $this->order[$i]->setUser($order_result[$i]['UserId']);
    $this->order[$i]->setStatus($order_result[$i]['status']);
  }
  return ($this->order);
}
else {
  return 0;
}
 }
 public function return_order($id)
 {
   $order_result =$this->order_query->fetch_order($id);
   $size = sizeof($order_result);
   if($size !=0){
  for($i =0; $i < $size  ;$i++){
    $this->order[$i] = new Order ();
    $this->order[$i]->setId($order_result[$i]['Id']);
    $this->order[$i]->setPharmacy($order_result[$i]['PharmacyId']);
    $this->order[$i]->setStatus($order_result[$i]['status']);
  }

  return ($this->order);
}
else {
  return 0;
}
 }
  public function return_pharmacy_name($id){
    $pharmacy_name =$this->order_query->fetch_pharmacy_name($id)[0]['Name'];
    return ($pharmacy_name);
  }
  public function return_user_name($id){
    $name_array =$this->order_query->fetch_user_name($id);
    $fname =$name_array[0]['FName'];
    $lname =$name_array[0]['LName'];
    return ($fname.$lname);
  }

public function return_all_pharmacy(){
  $order_result =$this->order_query->fetch_all_pharmacy();
  return ($order_result);
}
 public function checkorder($id)
 {
   return ($this->order_query->deleteOrder($id));
 }
 public function end_order($id)
 {
  $check = $this->order_query->end_order($id);
  if ($check == True){
    $this->order_query->edit_medicine_amount($id);
  }
   return ($check);
 }
 public function accept_order($id)
 {
   $accept =$this->order_query->accept_order($id);

   return ($accept);
 }
 public function fech_deatails($id)
 {
   $order_result = $this->order_query->fetch_order_details($id);
   if(isset($order_result)){
   $order_status=$this->order_query->get_Status($order_result[0]['status'])[0]['Status'];
   $pharmacy_name = $this->return_pharmacy_name($order_result[0]['PharmacyId']);
   $medicine = $this->order_query -> get_medicine_order($id);
   $medicine_lenght =sizeof($medicine);
     $medicine_array = [];
     if($medicine_lenght){
     for( $i=0 ;$i< $medicine_lenght ; $i++){
       $medicine_array[$i] =new MedicineOrder();
       $medicine_array[$i]->setAmount($medicine[$i]['Amount']);
       $medicine_name =$this->order_query->get_medicine_name($medicine[$i]['MedicineCode']);

       $medicine_array[$i]->setMedicine($medicine_name[0]['EnName']);
     }
    $this->order = new Order ();
    $this->order->setId($id)
        ->setPharmacy($pharmacy_name)
        ->setStatus($order_status)
        ->setDate($order_result[0]['date'])
        ->setMedicine($medicine_array);

     }
     return $this->order;
   }
   else {
     return False;
   }
 }
 public function newOrder($order)
 {
 	$order->id = $this->order_query->get_pending_orders($order);
 	if($order->id != -1)
 	{
 		$this->order_query->add_to_existing_order($order);
 	}
 	else {
 		$this->order_query->add_new_order($order);
 	}

 }
 public function fech_deatails_pharmacy($id)
 {
   $order_result = $this->order_query->fetch_order_pharmacy_details($id);
   if(isset($order_result)){
   $order_status=$this->order_query->get_Status($order_result[0]['status'])[0]['Status'];
   $User_name = $this->return_user_name($order_result[0]['UserId']);
   $medicine = $this->order_query -> get_medicine_order($id);
    $this->order = new Order ();
     $this->order->setId($id);
     $this->order->setUser($User_name);
     $this->order->setStatus($order_status);
     $this->order->setDate($order_result[0]['date']);
     $medicine_lenght =sizeof($medicine);
     $medicine_array;
     if($medicine_lenght){
     for( $i=0 ;$i< $medicine_lenght ; $i++){
       $medicine_array[$i] =new MedicineOrder();
       $medicine_array[$i]->setAmount($medicine[$i]['Amount']);
       $medicine_name =$this->order_query->get_medicine_name($medicine[$i]['MedicineCode']);

       $medicine_array[$i]->setMedicine($medicine_name[0]['EnName']);
     }
     $this->order->setMedicine($medicine_array);

     }
     return $this->order;
   }
   else {
     return False;
   }
 }

}

?>
