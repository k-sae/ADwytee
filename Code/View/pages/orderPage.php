<?php
include_once '../content/header.php';
include_once '../../Application/orderManger.php';
$orderManger =new orderManger();
?>
<head>
  <script src = "../js/order.js">  </script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
      $("#hh").click(function() {
          var val = "Hi";
          $.ajax ({
              url: "../../Application/test.php",
              data: { val : val },
              success: function( result ) {
                  alert("Hi, testing");

              }
          });
      });
  });
  </script>
  </head>
<table class="Ordertable" id ="order-table">

  <thead>
     <tr>
       <th colspan="3" class="head-table"> <?php echo  $language['orders']; ?></th>
     </tr>
     <tr>
       <th colspan="3" data-toggle="modal" data-target="#addorder" class="add-order ">
       <span class="fa fa-plus-square" aria-hidden="true"></span>
       <span ><?php echo $language['addorder'] ?></span></th>
       </tr>
       </thead>
   <tbody>
     <?php
     $array_order = $orderManger->return_order(1);

     if($array_order !=0){
       $size = sizeof($array_order);
       for($i =1; $i <=$size  ;$i++){

       echo '<tr>
         <td class="td-order" >'.$i.'</td>
         <td class="td-order">'
         .$orderManger->return_pharmacy($array_order[$i-1]->getPharmacyId())[0]["Name"].
         '</td>
         <td>

               <i class=" button-order details-order fa fa-info-circle"  aria-hidden="true"
               data-toggle="modal" data-target="#orderdetails" ></i>';
            if($array_order[$i-1]->getStatus() ==  1) {
              echo  '
          <i class=" button-order edit-order">  <span class="fa fa-pencil" aria-hidden="true" id ="hh"> </i>
           <i class=" button-order delete-order fa fa-trash"  aria-hidden="true"
           value= "'.$array_order[$i-1]->getId().'"onclick="deleteOrder('.$array_order[$i-1]->getId().',this)">
          </i>



           </td>
       </tr>';
     }}
   }?></tbody>

 </table>


<!--addorder-->
    <div class="modal fade" id="addorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>                   </button>
           <h4 class="modal-title" id="myModalLabel"><?php echo  $language['addorder']?></h4>
          </div>
          <div class="modal-body">
            <form  >
              <!-- select pharmacy-->
            <select name="users" onchange="showUser(this.value)" id="soflow" class ="select-pharmacy">
              <?php
              /*$pharmacys =$orderManger->return_all_pharmacy();
              $size_pharmay=sizeof($pharmacys);
              if($size_pharmay  == 0){
                echo "<option value=\"\">".$language['nopharmacyyet'].":</option>";
              }
             else {
                 echo '<option value="">'.$language['allpharmacy'].':</option>';
                  for ($i=1; $i <=$size_pharmay ; $i++) {
                  $pharmacy_name=  $pharmacys[$i-1]['Name'] ;
                   echo '<option value='.$pharmacys[$i-1]['PharmacyId'].'>'.$pharmacy_name.'</option>';
                }

              }*/
              ?>
            </select>
            <!--select medicine -->
            <select name="users" onchange="showUser(this.value)" id="soflow" class="select-medicine">
              <?php /*
              $pharmacys =$orderManger->return_all_pharmacy();
              $size_pharmay=sizeof($pharmacys);
              if($size_pharmay  == 0){
                echo "<option value=\"\">".$language['nopharmacyyet'].":</option>";
              }
             else {
                 echo '<option value="">'."alll".':</option>';
                  for ($i=1; $i <=$size_pharmay ; $i++) {
                  $pharmacy_name=  $pharmacys[$i-1]['Name'] ;
                   echo '<option value='.$pharmacys[$i-1]['PharmacyId'].'>'.$pharmacy_name.'</option>';
                }

              }
              */
              ?>
            </select>
            <!-- amount of medicine -->
            <input type="number" name="quantity" min="1" max="5" class="amount">
           </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo  $language['cancel']?></button>
            <button type="button" class="btn btn-primary"><?php echo  $language['saveorder']?></button>
          </div>
        </div>
      </div>
  </div>
  <!--details div-->
  <div class="modal fade" id="orderdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>                   </button>
         <h4 class="modal-title" id="myModalLabel"><?php echo  $language['orderdetails']?></h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="canc btn btn-primary "data-dismiss="modal"><?php echo  $language['cancel']?></button>

        </div>
      </div>
    </div>
</div>

 <?php

 if(isset($_GET["val"])){


   echo $_GET["val"];
 }
 else{
  echo "no";
 }
 include '../content/footer.php';
 ?>
    </body>
</html>
