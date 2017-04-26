<?php
include '../content/header.php';
include '../../Database/pharmacy.php';
$ph=new Pharmacy_Query();
$arry=$ph->fetch_PDetails('1');
$arrys=$arry[0];
$bloodpressures=$ph->fetch_BloodPressure('1');
$alergies=$ph->fetch_Alergias('1');
$risks=$ph->fetch_RISK('1');
//$bloodpressures=$bloodpressure[];
?>
<div class="container">
	<div class="Patient_info">
		<div class="table-responsive col-lg-4 details-table">
		  <table class="table">
		    <tr class="detail">
		    	<td>Name:</td>
		    	<td><?php echo $arrys["FName"];?></td>	
		    </tr>
		    <tr class="detail">
		    	<td>Height:</td>
		    	<td><?php echo $arrys["Height"];?></td>	
		    </tr>
		    <tr class="detail">
		    	<td>Weight:</td>
		    	<td><?php echo $arrys["Weight"];?></td>	
		    </tr>
		    <tr class="detail">
		    	<td>PatientID:</td>
		    	<td><?php echo $arrys["Key"];?></td>	
		    </tr>
		    <tr class="detail">
		    	<td>Gender:</td>
		    	<td><?php echo $arrys["Gender"];?></td>	
		    </tr>
		  </table>
		</div>
		<div class="table-responsive col-lg-4 details-table-2">
			<table class="table">
				<tr class="detail">
			    	<td>Adress:</td>
			    	<td><?php echo $arrys["FName"];?></td>	
			    </tr>
			    <tr class="detail">
			    	<td>Telephone:</td>
			    	<td><?php echo $arrys["Height"];?></td>	
			    </tr>
			    <tr class="detail">
			    	<td>consaltant Pharmacy:</td>
			    	<td><?php echo $arrys["Weight"];?></td>	
			    </tr>
			</table>
		</div> 		
	</div>
	<div class="bloodPressureTable col-lg-3">
		<table class="table table-bordered table-responsive">
		    <thead>
		      <tr>
		        <th>Systolic</th>
		        <th>Diastolic</th>
		        <th>date</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($bloodpressures as $bloodpressure){
					echo"<tr>";
		        	echo "<td>".$bloodpressure["systolic"]."</td>";
		        	echo "<td>".$bloodpressure["diastolic"]."</td>";
		        	echo "<td>".$bloodpressure["date"]."</td>";
		      		echo"</tr>";
		    	}
		     ?>
		    </tbody>
		</table>
	</div>
	<div class="Allrgie-table col-lg-8 table-responsive col-sm-8">
		<table class="table table-bordered table-responsive">
		    <thead>
		      <tr>
		        <th>Name </th>
		        <th>Date of reaction</th>
		        <th>Type of reaction </th>
		        <th>Notes </th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    foreach ($alergies as $alergie){
					echo"<tr>";
		        	echo "<td>".$alergie["Name"]."</td>";
		        	echo "<td>".$alergie["DOR"]."</td>";
		        	echo "<td>".$alergie["TOR"]."</td>";
		        	echo "<td>".$alergie["Notes"]."</td>";
		      		echo"</tr>";
		    	}
		     ?>
		    </tbody>
		</table>
	</div>
	<div class="col-lg-8 Risk">
		<h3>Risk factors</h3>
		<?php
		    foreach ($risks as $risk){
		        	echo "<h5>".$risk["RiskFactor"]."</h5>";
		    	}
		     ?>

	</div>
	<!-- TO DO  beccause karim is a piece of shiit add later  a Database table containing an tiy int value and medicine name  and  patient id to  make last tabel -->
</div>	


<?php
include '../content/footer.php';
?>
