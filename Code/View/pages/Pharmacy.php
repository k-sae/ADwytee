<?php
if(isset($_POST['Code']) && isset($_POST['EnName']) && isset($_POST['ArName']) && isset($_POST['Description'])&& isset($_POST['amount'])){
	include_once '../../Application/Medicine.php';
	include_once '../../Application/RegisterMedicine.php';
  session_start();
	$medicine = new Medicine();
	$medicine->setCode($_POST['Code']);
	$medicine->setEnName($_POST['EnName']);
	$medicine->setArName($_POST['ArName']);
	$medicine->setDescription($_POST['Description']);

	$rm = new RegisterMedicine();
	$rm->register($_SESSION['userId'], $medicine, $_POST['amount']);
  header("Location: Pharmacy.php");
}else if(isset($_POST['medicine']) && isset($_POST['amount'])){
	include_once '../../Application/RegisterMedicine.php';
  session_start();
	$rm = new RegisterMedicine();
	$rm->add($_SESSION['userId'], $_POST['medicine'], $_POST['amount']);
	header("Location: Pharmacy.php");
}

include '../content/header.php';
include '../../Application/pharmacyclass.php';

$ph=new Pharmacy();
$arry=$ph->fetch_Pharmacy($_SESSION['userId']);
$arrys=$arry[0];
$arrays=$ph->fetchmedicine($_SESSION['userId']);
if(count($arrays)>0){
$medicines=array();
foreach ($arrays as $array){
array_push($medicines, $ph->fetch_medicine_info($array["MedicineCode"]));
}}
?>
<div class="reg-back" style = "min-height: 100vh">
    <div class="wrapper2 container" style="margin-top:30px">
	    <div class="details col-sm-9">
			<div class="info col-sm-10">
				<h3><?php echo $language["name"];?>: <?php echo $arrys["Name"];?> </h3>
				<h3><?php echo $language["location"];?>: <?php echo $arrys["Latitude"] .','. $arrys["Longitude"] ;?></h3>
				<h3><?php echo $language["telephone"];?>: <?php echo $arrys["Telephone"];?> </h3>
				<h3><?php echo $language["notes"];?>: <?php echo $arrys["Notes"];?></h3>
				<h3><?php echo $language["describtion"];?>: <?php echo $arrys["Describition"];?></h3>
			</div>
	    </div>
    </div>
    <div class="container" style="padding-bottom:50px">
	<div class="container darklay col-md-12" style="padding-bottom:30px">
		  <h2>Medicine Table</h2>
		  <div class="table-responsive">
		  <table class="table">
		    <thead>
		      <tr>
		        <th><?php echo $language["barcode"];?></th>
		        <th><?php echo $language["medicineenname"];?></th>
		        <th><?php echo $language["medicineenname"];?></th>
		        <th><?php echo $language["amount"];?></th>

		        <!--ask about medicine amount and expire date-->
		      </tr>
		    </thead>
		    <tbody>

		      <?php
		   for ($x = 0; $x <sizeof($arrays); $x++) {
    			echo"<tr>
                <td>".$arrays[$x]['MedicineCode']."</td>";
    			echo "<td>".$medicines[$x][0]["EnName"]."</td>";
    			echo "<td>".$medicines[$x][0]["ArName"]."</td>";
    			echo "<td>".$arrays[$x]['Amount']."</td>
              </tr>";
               }
		     ?>

		    </tbody>
		  </table>
		  </div>
		  <button class=" btn btn-primary" data-toggle="modal" data-target="#check_medicine">ADD NEW MEDICINE</button>
		</div>
    </div>
</div>

		<div class="modal fade" id="check_medicine" tabindex="-1" role="dialog" aria-labelledby="check_medicineLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="check_medicineLabel" style="color: black; ">Check</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        
		        <div> <iframe src="registeriframe.html" id="frame" frameborder="0" scrolling="no"></iframe></div>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" style="color: black; " data-dismiss="modal">Close</button>
		       <button type="button" class="btn btn-primary" >Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>


<?php
include '../content/footer.php';
?>
