<?php
$page = "stat";
include '../content/header.php';
?>

<div class="wrapper">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
        	<br><br><br><br><br><br><br><br><br><br><br><br>

        	<form action="statpdf.php" target="_blank">
            <select name="reportType" id="" style=" color: #000;">
                <option value="patient">patient</option>
                <option value="order">order</option>
                <option value="pharmacy">pharmacy</option>
            </select>
          	<input type="submit" class="btn btn-primary" value="Export as PDF" />
          </form>

        </div>
      </div>
    </div>
</div>

<?php
include '../content/footer.php';
?>
