<?php
$file_name = '../Database/order.php';
try {
include_once ($file_name) ;

 } catch (Exception $e) {
 echo "error in file name";

}
$order_query=  new Order_Query();
echo $_GET["q"];
if(isset($_GET["q"])){
   $this->order_query->add();
}
if(isset($_GET["val"])){
   $this->order_query->add();
}
 ?>
