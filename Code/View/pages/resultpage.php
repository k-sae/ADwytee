<?php
include '../../Application/result.php';
include '../content/header.php';
$medicine = $_GET["result"];
?>

<div class="wrapper">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
					<div class="searchagain">
						<br><br>
						<h4><?php echo  $language['searchagain']?></h4>
	          <form action="resultpage.php" method="get"><input name="result" placeholder="<?php echo  $language['search']?>" type="text" size="86" autocomplete="off" required="required" onkeyup="showResult(this.value)">
	          	<div id="livesearch"></div>
	          </form>
          </div>
          
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
