<?php
include_once 'language.php';
?>
<!DOCTYPE html>
<html  lang="<?php echo $_SESSION["language"]; ?>">
<head>
	<title></title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bugfix.css" rel="stylesheet">
</head>
<body style="background-color: #fff;" dir = <?php echo $dir?> >
	<form action="Pharmacy.php" method="post" target="_top">
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-4 col-form-label"><?php echo $language['medicineenname']; ?>:</label>
			<div class="col-xs-5">
				<input class="form-control" name="EnName" type="text" placeholder="<?php echo $language['medicineenname']; ?>" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-4 col-form-label"><?php echo $language['medicinearname']; ?>:</label>
			<div class="col-xs-5">
				<input class="form-control" name="ArName" type="text" placeholder="<?php echo $language['medicinearname']; ?>" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-4 col-form-label"><?php echo $language['barcode']; ?>:</label>
			<div class="col-xs-5">
				<input class="form-control" name="Code" type="text" placeholder="<?php echo $language['barcode']; ?>" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-4 col-form-label"><?php echo $language['desc']; ?>:</label>
			<div class="col-xs-5">
				<textarea class="form-control" name="Description" id="exampleTextarea" placeholder="<?php echo $language['desc']; ?>" rows="3" required="required"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-4 col-form-label"><?php echo $language['amount']; ?>:</label>
			<div class="col-xs-5">
				<input class="form-control" name="amount" type="number" placeholder="<?php echo $language['amount']; ?>" id="example-text-input" required="required">
			</div>
		</div>
		
		<div align="center">
  		<input type="submit" class="btn-primary btn" value="submit">
  	</div>
	</form>

    <script src="../js/jquery-3.2.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bugfix.js"></script>
    <script src="../js/livesearch.js"></script>
</body>
</html>