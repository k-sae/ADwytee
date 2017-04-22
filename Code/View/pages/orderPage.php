<?php
include_once '../content/header.php';
include_once '../../Application/order.php';
$order =new order();
?>
<head>
       <title><?php echo $language['orderpage'] ?></title>
<script src = "../js/order.js">  </script>
</head>
<div class="overlay" id ="div">
  <!-- close button-->
  <a   href="#"class="close-button" onclick="closeDiv1()">&#8864</a>
  <!-- ovarly page -->
  <!--open ovarly -->
   </div>


<div style="overflow-x:auto;">
  <table class="Ordertable table-responsive">
  <thead>
     <tr>
       <th colspan="3"> <?php echo  $language['orders']; ?></th>
     </tr>
     <tr>
       <th class="material-icons button-order add-order">+</th>
       <th colspan="2" class ="material-icons button-order add-order">
           <span  onclick="OpenDiv1()"><?php echo  $language['addorder'] ?></span></th>

        </tr>
   </thead>
   <tbody>
     <?php
     $array_order = $order->return_oreder(1);
     if($array_order !=0){
       $size = sizeof($array_order);
       for($i =1; $i <=$size  ;$i++){

       echo '<tr>
         <td >'.$i.'</td>
         <td class="td-order">'.$order->return_pharmacy($array_order[$i-1]["PharmacyId"])[0]["Name"].
         '</td>
         <td>
               <i class="material-icons button-order details-order" onclick="OpenDiv2()">'.$language['details'].'</i>';
            if($array_order[$i-1]["status"] ==  1) {
              echo  '
          <i class="material-icons button-order edit-order">'. $language['edit'].'</i>
           <i class="material-icons button-order delete-order">'.$language['delete'].'</i>



           </td>
       </tr>';
     }}
   }?></tbody>
 </table>
 </div>
 <div class="overlay" id ="div2">
   <!-- close button-->
   <a   href="#"class="close-button" onclick="closeDiv2()">&#8864</a>
   <!-- ovarly page -->

   <?php

   //var_dump(  $array_order) ;
    //var_dump ($order->return_pharmacy($array_order[2]["PharmacyId"])[0]["Name"]);
    ?>
    </div>

 <?php
 //var_dump(  $array_order) ;
  //var_dump ($order->return_pharmacy($array_order[2]["PharmacyId"])[0]["Name"]);
  
include '../content/footer.php';
?>
    </body>
</html>
