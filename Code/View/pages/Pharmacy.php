<?php
include '../content/header.php';
include '../../Database/pharmacy.php';
$ph=new Pharmacy_Query();
$arry=$ph->fetch_Pharmacy($_SESSION['userId']);
$arrys=$arry[0];

if(isset($_POST['Code']) && isset($_POST['EnName']) && isset($_POST['ArName']) && isset($_POST['Description'])&& isset($_POST['amount'])){
	include_once '../../Application/Medicine.php';
	include_once '../../Application/RegisterMedicine.php';

	$medicine = new Medicine();
	$medicine->setCode($_POST['Code']);
	$medicine->setEnName($_POST['EnName']);
	$medicine->setArName($_POST['ArName']);
	$medicine->setDescription($_POST['Description']);

	$pharmacyId = 1;
	$rm = new RegisterMedicine();
	$rm->register($pharmacyId, $medicine, $_POST['amount']);
/****************************************************************/
}else if(isset($_POST['medicine']) && isset($_POST['amount'])){
	include_once '../../Application/RegisterMedicine.php';

	$pharmacyId = 1;
	$rm = new RegisterMedicine();
	$rm->add($pharmacyId, $_POST['medicine'], $_POST['amount']);
}
?>
    <div class="wrapper2 container" style="margin-top:50px">
	    <div class="details col-sm-9">
			<div class="img col-sm-2"></div>
			<div class="info col-sm-10">
				<h3>name :<?php echo $arrys["Name"];?> </h3>
				<h3>Location : <?php echo $arrys["Latitude"] .','. $arrys["Longitude"] ;?></h3>
				<h3>Telephone :<?php echo $arrys["Telephone"];?> </h3>
				<h3> notes :<?php echo $arrys["Notes"];?></h3>
				<h3>decribition :<?php echo $arrys["Describition"];?></h3>
			</div>
			 <button class=" btn btn-lg btn-primary"> edit</button>
	    </div>
	     <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="" data-toggle="modal" data-target="#bind" class="list-group-item active">Add pharmacy patient</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div>
    </div>
    <div class="modal fade" id="bind" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content bind">
              <div class="darklay">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                 <form action="Pharmacy.php" method="post" target="_top">
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">First Name:</label>
			<div class="col-xs-5">
				<input class="form-control" name="FName" type="text" placeholder="First Name" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">Last Name:</label>
			<div class="col-xs-5">
				<input class="form-control" name="LName" type="text" placeholder="Last Name" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label class="checkbox-inline"><input type="checkbox" value="">Male</label>
			<label class="checkbox-inline"><input type="checkbox" value="">Female</label>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">Height</label>
			<div class="col-xs-5">
				<input class="form-control" name="Height" type="text" placeholder="Height" id="example-text-input" required="required">
			</div>

		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">weight</label>
			<div class="col-xs-5">
				<input class="form-control" name="weight" type="text" placeholder="weight" id="example-text-input" required="required">
			</div>
		</div>
		
		
	</form>
                <div class="modal-footer">
        			<div align="center">
  						<input type="submit" class="btn-primary btn" value="submit">
  					</div>      
                </div>
              </div>
            </div>
            </div>

         </div>
    </div>
    <a href="PatientHistory.php"><button class="btn btn-lg btn-primary">Patient History</button></a>
	<div class="container col-md-12">
		  <h2>Medicine_Table</h2>
		  <div class="table-responsive">
		  <table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Parcode</th>
		        <th>English name</th>
		        <th>Arabic name</th>
		        <th>Amount</th>
		        <th>expire date</th>
		        <th>edit</th>

		        <!--ask about medicine amount and expire date-->
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		      <!--ADDed medcines displau-->
		        <td>1</td>
		        <td>Anna</td>
		        <td>Pitt</td>
		        <td>35</td>
		        <td>New York</td>
		        <td>USA</td>
		        <td><button class="btn-primary btn"> edit medicine</button></td>
		      </tr>
		    </tbody>
		  </table>
		  </div>
		  <button class=" btn btn-primary" data-toggle="modal" data-target="#check_medicine">ADD_NEW_MEDICINE</button>
		</div>
		<div class="modal fade" id="check_medicine" tabindex="-1" role="dialog" aria-labelledby="check_medicineLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="check_medicineLabel">Check</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        
		        <div> <iframe src="registeriframe.html" id="frame" frameborder="0" scrolling="no"></iframe></div>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		       <button type="button" class="btn btn-primary" >Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>


<?php
include '../content/footer.php';
?>
