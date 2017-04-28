<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bugfix.css" rel="stylesheet">
</head>
<body style="background-color: #fff;">
	<form action="Pharmacy.php" method="post" target="_top">
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">English Name:</label>
			<div class="col-xs-5">
				<input class="form-control" name="EnName" type="text" placeholder="Medicine Name" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">Arabic Name:</label>
			<div class="col-xs-5">
				<input class="form-control" name="ArName" type="text" placeholder="Arabic Name" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">Barcode:</label>
			<div class="col-xs-5">
				<input class="form-control" name="Code" type="text" placeholder="Barcode" id="example-text-input" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-3 col-form-label">Description:</label>
			<div class="col-xs-5">
				<textarea class="form-control" name="Description" id="exampleTextarea" placeholder="Describtion" rows="3" required="required"></textarea>
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