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
          	<input type="submit" class="btn btn-primary" value="Export as PDF" />
          </form>

        </div>
      </div>
    </div>
</div>

<?php
include '../content/footer.php';
?>
