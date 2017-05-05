<?php
include '../../Application/result.php';
include '../content/header.php';
$medicine = $_GET["result"];
$medicineCode = $_GET["code"];
if (!isset($_SESSION["latitude"]) || !isset($_SESSION["longitude"])) {
	echo '<script> alert("'. $language["requestdenied"].'");
					window.location.href = "index.php";
	 			</script>';
}else{
	$result = new result();
}
?>

<div class="wrapper">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
					<div class="searchagain">
						<br><br>
						<h4><?php echo  $language['searchagain']?></h4>
	          <form action="resultpage.php" method="get">
              <div class="input-group">
                <input class="form-control" name="result" placeholder="<?php echo $language['search']?>" type="text" autocomplete="off" required="required" onkeyup="showResult(this.value)">
                <span class="input-group-addon">
                  <button type="submit" id="searchbtn"><i class="fa fa-search"></i></button>
                </span>
              </div>
              <div id="livesearch"></div>
            </form>
         	</div>
          
          <table class="Resulttable">
					  <tr>
					  	<th colspan="2"> <?php echo $language['resultsfor'] . " "."<a href='MedicinePage.php?code=" .$medicineCode."' >". $medicine ."</a>"; ?></th>
					  </tr>
					  <tbody>

					  	<?php 
					  		$results = $result->fetch($medicine);

					  		if(sizeof($results) != 0){
						      for($i = 0; $i < sizeof($results); $i++){

						        $distance = $result->getDistance($_SESSION['latitude'],$_SESSION['longitude'], $results[$i]['Latitude'],$results[$i]['Longitude'], "K");

						      	echo "<tr>
						              	<td>
						              		". $language['pharmacy'].": <a href=''>" . $results[$i]['Name'] . "</a>
						              		<br> ". $language['quantity'].": " . $results[$i]['Amount'] . "
						                  <br>". $language['farfromyou'].": " . number_format($distance,2) . $language['km'] ."
						                </td>
						                <td>
						                  <i><a href='MedicinePage.php?code=".$medicineCode."&phar=".$results[$i]['PharmacyId']."'> ". $language['ordernow']." </a></i>
						                </td>
						              </tr>";
						      }
						    } else {
						      echo "<tr>
						              <td>". $language['noresults']."</td>
						            </tr>";
						    }

					  	?> 
					     
					  </tbody>
					</table>
        </div>
      </div>
    </div>
</div>

<?php
include '../content/footer.php';
?>
