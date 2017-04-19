<?php
include '../content/header.php';
if (!isset($_SESSION["type"])){
$_SESSION["type"] ='Pharmacy';
}
else {

$_SESSION["type"] ='Patient';
}
include_once '../../Application/order.php';
$order =new order();
?>
<head>
       <title><?php echo $language['orderpage'] ?></title>

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
         <a  href="#" class="close-button">&#8864</a>
         <!-- ovarly page -->
         <!--open ovarly -->
         <th colspan="2" class ="material-icons button add2">
           <span  onclick="OpenDiv"><?php echo $language['addorder'] ?></span></th>
         <script src = "../js/order.js" type = "text/javascript">
         function OpenDiv() {
           var thediv =document.getElementById("div") ;
           thediv.style.transform = "scale(1)";
         }

          </script>
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

           <i class="material-icons button details">'.$language['details'].'</i>
          <i class="material-icons button edit">'. $language['edit'].'</i>
           <i class="material-icons button delete">'.$language['delete'].'</i>



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
