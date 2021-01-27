<?php
include_once 'language.php';
include_once '../../Application/orderManger.php';
$orderManger =new orderManger();
/* delete message */
if(isset($_GET["delete"])){
$id = $_GET["delete"];
$message= $orderManger->checkorder($id);
if($message == True){
    echo $language['deletedone'];
  }
  else {
    echo $language['refresh'];
  }
}
/* accept message */
if(isset($_GET["accept"])){
$id = $_GET["accept"];
 $message= $orderManger->accept_order($id);
if($message == 0){
    echo '<i class=" button-order edit-order fa fa-check-square-o"  aria-hidden="true"
     onclick="finshorder('.$id.',this)"> </i>';
  }
  else{ if ($message == 1) {
     echo $language['nomedicine'];
  }
  else {
    echo $language['refresh'];
  }
}
}
/* decline message */
if(isset($_GET["decline"])){
$id = $_GET["decline"];
$message= $orderManger->checkorder($id);
if($message == True){
    echo $language['declinedone'];
  }
  else {
    echo $language['refresh'];
  }
}
/* finsh message */
if(isset($_GET["finsh"])){
$id = $_GET["finsh"];
$message= $orderManger->end_order($id);

if($message == True){
    echo $language['finishdone'];

  }
  else {
    echo $language['refresh'];
  }
}
/*details show*/
if(isset($_GET["details"])){
$id = $_GET["details"];
$order =  $orderManger->fech_deatails($id);

if ($order != False){
echo '<div class="label-details">
<span class="label label-default">'.$language['orderid'].$order->getID().'</span>
<br>
<span class="label label-primary">'.$language['pharmacyname'].$order->getPharmacy().'</span>
<br>
<span class="label label-info">'. $language['orderstaus'].$language[$order->getStatus()].'</span>
<br>
<span class="label label-success">'.$language['orderdate'].$order->getDate().'</span>
</div> <br>'
;
echo '<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">'.$language['medicineinorder'] .'</div>

  <!-- Table -->
  <table class="table">';
  echo '<thead> <tr> <td>'.$language['medicinename'].'</td> <td>'.$language['amount'].'</td> </tr> </thead>';
   $medicine = $order->getMedicine();
   $medicine_lenght = sizeof ($medicine);
   if( $medicine_lenght != 0){
     echo '<tbody>';
     for ($i=0; $i <$medicine_lenght ; $i++) {
      echo '<tr> <td>'.$medicine[$i]->getMedicine().' </td> <td>'.$medicine[$i]->getAmount().' </td> </tr>';
     }
      echo '</tbody>';
   }


  echo '</table>
</div>';
}
else {
  echo '<span class="label label-danger label-details">'.$language['refresh'].'</span>';
}

}
/*details pharmacy show*/
if(isset($_GET["detailspharmacy"])){
$id = $_GET["detailspharmacy"];
$order =  $orderManger->fetch_details_pharmacy($id);

if ($order != False){
echo '<div class="label-details">
<span class="label label-default">'.$language['orderid'].$order->getID().'</span>
<br>
<span class="label label-primary">'.$language['orderername'].$order->getuser().'</span>
<br>
<span class="label label-info">'. $language['orderstaus'].$language[$order->getStatus()].'</span>
<br>
<span class="label label-success">'.$language['orderdate'].$order->getDate().'</span>
</div> <br>'
;
echo '<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">'.$language['medicineinorder'] .'</div>

  <!-- Table -->
  <table class="table">';
  echo '<thead> <tr> <td>'.$language['medicinename'].'</td> <td>'.$language['amount'].'</td> </tr> </thead>';
   $medicine = $order->getMedicine();
   $medicine_lenght = sizeof ($medicine);
   if( $medicine_lenght != 0){
     echo '<tbody>';
     for ($i=0; $i <$medicine_lenght ; $i++) {
      echo '<tr> <td>'.$medicine[$i]->getMedicine().' </td> <td>'.$medicine[$i]->getAmount().' </td> </tr>';
     }
      echo '</tbody>';
   }


  echo '</table>
</div>';
}
else {
  echo '<span class="label label-danger label-details">'.$language['refresh'].'</span>';
}

}

 ?>
