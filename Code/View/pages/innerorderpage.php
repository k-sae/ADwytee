<?php
include_once 'language.php';

include_once '../../Application/orderManger.php';
$orderManger =new orderManger();

if(isset($_GET["id"])){

  $id = $_GET["id"];

  $message= $orderManger->checkorder($id);
if($message == True){
    echo $language['deletedone'];
  }
  else {
    echo $language['refresh'];
  }
}

 ?>
