<?php
include '../content/header.php';
include '../../Database/pharmacy.php';
$ph=new Pharmacy_Query();
$arry=$ph->fetch_Pharmacy('1','1');
$arrys=$arry[0];
?>
    <div class="wrapper2 container" style="margin-top:50px">
	    <div class="details col-sm-9">
			<div class="img col-sm-2"></div>
			<div class="info col-sm-10">
				<h3>name :<?php echo $arrys["Name"];?> </h3>
				<h3>Location : <?php echo $arrys["Longtiude"] .','. $arrys["Latitiude"] ;?>  </h3>
				<h3>Telephone :<?php echo $arrys["Telephone"];?> </h3>
				<p> notes :<?php echo $arrys["Notes"];?></p>
				<p>decribition :<?php echo $arrys["Describition"];?></p>
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
		      </tr>
		    </tbody>
		  </table>
		  </div>
		</div>


<?php
include '../content/footer.php';
?>
