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
            <select class="form-control-static" name="reportType" id="" style=" color: #000;">
                <option value="order"><?php echo $language['orders']?></option>
                <option value="patient"><?php echo $language['patient']?></option>
                <option value="pharmacy"><?php echo $language['pharmacy']?></option>
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
