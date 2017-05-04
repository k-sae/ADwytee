<?php
include_once '../content/header.php';
include_once '../../Application/orderManger.php';
$orderManger =new orderManger();
?>
<head>
  <script src = "../js/order.js">  </script></head>
  <!-- order tabale -->
<table class="Ordertable table" id ="order-table">
<thead>
     <tr>
       <th colspan="3" class="head-table"> <?php echo  $language['pharmacyorder']; ?></th>
     </tr></thead>
   <tbody>
     <?php
     $array_order = $orderManger->return_order_pharmacy(1);

       if($array_order !=0){
       $size = sizeof($array_order);
       for($i =1; $i <=$size  ;$i++){
         echo "<tr>
         <td class='td-order' >".$i."</td>
         <td class='td-order'>"
         .$orderManger->return_user_name($array_order[$i-1]->getuser()).
         "</td>
         <td>
          <i class=' button-order details-order fa fa-info-circle'  aria-hidden='true'
          data-toggle='modal' data-target='#orderdetails' onclick=openDetailsPharmacy(".$array_order[$i-1]->getId().") ></i>";
            if($array_order[$i-1]->getStatus() ==  1) {
              echo  '
            <span id = '.$i.'>
          <i class=" button-order edit-order fa fa-check" aria-hidden="true"
          onclick="accept('.$array_order[$i-1]->getId().','.$i.')"> </i>
          <i class=" button-order delete-order fa fa-times" aria-hidden="true"
           onclick="decline('.$array_order[$i-1]->getId().',this)">  </i></span></td></tr>';}
           else{
          echo  '<i class=" button-order edit-order fa fa-check-square-o"  aria-hidden="true"
           onclick="finshorder('.$array_order[$i-1]->getId().',this)"> </i>';
           }
         }}?>
         </tbody>

   </table>
   <!--delete div -->
  <div id = "error">
    <div class="label label-danger label-details" id ="wrong-message">

      </div>
      <i class="fa fa-window-close close-icon fa-2x" aria-hidden="true" onclick="closediv()"> </i>
    </div>

  <!--details div-->
  <div class="modal fade" id="orderdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header details-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>                   </button>
         <h4 class="modal-title details-body" id="myModalLabel"><?php echo  $language['orderdetails']?></h4>
        </div>
        <div class="modal-body details-body" id="details-Pharmacy-body">

        </div>
        <div class="modal-footer details-body">
          <button type="button" class="cancle-button btn btn-primary " data-dismiss = "modal"><?php echo  $language['cancel']?></button>

        </div>
      </div>
    </div>
</div>

 <?php
 //$m =$array_order[0]->tostring();
  //$n = Order :: fromstring($m);
  //var_dump($n);
//echo $m;

 //var_dump(unserialize($m));
// var_dump($array_order[0]);
include '../content/footer.php';
 ?>
