<?php
include_once '../content/header.php';
include_once '../../Application/order.php';
$order =new order();
?>
<head>
       <title><?php echo $language['orderpage'] ?></title>
<script src = "../js/order.js">  </script>
</head>
<div style="overflow-x:auto;">
  <table class="Ordertable table-responsive">
  <thead>
     <tr>
       <th colspan="3"> <?php echo  $language['orders']; ?></th>
     </tr>
     <tr>
       <th>#</th>
       <div class="overlay" id ="div">
         <!-- close button-->
         <a  href="#" class="close-button" onclick="closeDiv()">&#8864</a>
         <!-- ovarly page -->
         <!--open ovarly -->
         <th colspan="2" class ="material-icons button-order add-order">
           <span  onclick="OpenDiv()"><?php echo $language['addorder'] ?></span></th>



         </div>
       </div>

      </tr>
   </thead>
   <tbody>
     <?php   for($i =1; $i <= 5 ;$i++){

       echo '<tr>
         <td>'.$i.'</td>
         <td>pharmacyname</td>
         <td>

           <i class="material-icons button-order details-order">'.$language['details'].'</i>
          <i class="material-icons button-order edit-order">'. $language['edit'].'</i>
           <i class="material-icons button-order delete-order">'.$language['delete'].'</i>



           </td>
       </tr>
       ';
     } ?></tbody>
 </table>
 </div>
<!-- overlay div -->

 <?php

include '../content/footer.php';
?>
    </body>
</html>
