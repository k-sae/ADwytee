<?php
include '../../Application/result.php';
include '../content/header.php';
$medicine = $_GET["result"];
if (!isset($_SESSION["latitude"]) || !isset($_SESSION["longitude"])) {
	echo '<script> alert("'. $language["requestdenied"].'");
					window.location.href = "index.php";
	 			</script>';
}
?>

<div class="wrapper">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
					<div class="searchagain">
						<br><br>
						<h4><?php echo  $language['searchagain']?></h4>
	          <form action="resultpage.php" method="get"><input class="form-control" name="result" placeholder="<?php echo $language['search']?>" type="text" autocomplete="off" required="required" onkeyup="showResult(this.value)">
            <div id="livesearch"></div>
	          </form>
         	</div>
          
          <table class="Resulttable">
					  <tr>
					  	<th colspan="2"><?php echo $language['resultsfor'] . " " . $medicine; ?></th>
					  </tr>
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
