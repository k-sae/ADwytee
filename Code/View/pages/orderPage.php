<?php
include_once '../content/header.php';
include_once '../../Application/order.php';
$order =new order();
?>
<head>
       <title><?php echo $language['orderpage'] ?></title>
<script src = "../js/order.js">  </script>
<script>
function delete_order(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>

</script>
</head>
<div class="overlay" id ="div">
  <!-- close button-->
  <a   href="#"class="close-button" onclick="closeDiv1()">&#8864</a>
  <!-- ovarly page -->
  <form  >
    <!-- select pharmacy -->
  <select name="users" onchange="showUser(this.value)" id="soflow" class ="select-pharmacy">
    <?php
    $pharmacys =$order->return_all_pharmacy();
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

    }
    ?>
  </select>
  <!--select medicine -->
  <select name="users" onchange="showUser(this.value)" id="soflow" class="select-medicine">
    <?php
    $pharmacys =$order->return_all_pharmacy();
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
    ?>
  </select>
  <!-- amount of medicine -->
  <input type="number" name="quantity" min="1" max="5" class="amount">
 </div>
</form>
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


    </div>

 <?php
 //var_dump(  $array_order) ;
  //var_dump ($order->return_pharmacy($array_order[2]["PharmacyId"])[0]["Name"]);
//var_dump(  $pharmacy_name) ;
if(isset($_GET['q'])){
$q = intval($_GET['q']);
echo $q;
}
include '../content/footer.php';
?>
    </body>
</html>
