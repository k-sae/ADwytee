<?php
include '../../Application/result.php';
include '../content/header.php';
$medicine = $_GET["result"];
?>

<div class="wrapper">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <table class="Ordertable">

          	<thead>
		     <tr>
		       <th colspan="3">Results</th>
		     </tr>
		     <tr>
		       <th>#</th>
		       <th colspan="2">Pharmacies</th>
		     </tr>
		   </thead>

		   <tbody>


		      <?php new result($medicine); ?> 

		     
		   </tbody>

		 </table>

        </div>
      </div>
    </div>
</div>

<?php
include '../content/footer.php';
?>
