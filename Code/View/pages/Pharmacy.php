<?php
include '../content/header.php';
//include '../../Database/pharmacy.php';
//$ph=new Pharmacy_Query();
//$arry=$ph->fetch_Pharmacy('1','1');
//$arrys=$arry[0];

if(isset($_POST['Code']) && isset($_POST['EnName']) && isset($_POST['ArName']) && isset($_POST['Description'])){
	include_once '../../Application/Medicine.php';
	include_once '../../Application/RegisterMedicine.php';
	$medicine = new Medicine();
	$medicine->Code = $_POST['Code'];
	$medicine->EnName = $_POST['EnName'];
	$medicine->ArName = $_POST['ArName'];
	$medicine->Description = $_POST['Description'];
	new RegisterMedicine($medicine);
}
?>
    <div class="wrapper2 container" style="margin-top:50px">
	    <div class="details col-sm-9">
			<div class="img col-sm-2"></div>
			<div class="info col-sm-10">
				<h3>name :<!--<?php// echo $arrys["Name"];?>--> </h3>
				<h3>Location : <!--<?php //echo $arrys["Longtiude"] .','. $arrys["Latitiude"] ;?> --> </h3>
				<h3>Telephone :<!--<?php //echo $arrys["Telephone"];?>--> </h3>
				<h3> notes :<!--<?php// echo $arrys["Notes"];?>--></h3>
				<h3>decribition :<!--<?php //echo $arrys["Describition"];?>--></h3>
			</div>
			 <button class=" btn btn-lg btn-primary"> edit</button>
	    </div>
	     <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
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
