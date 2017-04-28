<?php

$medicine = $_GET["result"];
//echo $medicine;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bugfix.css" rel="stylesheet">
</head>
<body style="background-color: #fff;" align="center">
<h4> <div align="center"><?php echo $medicine; ?></div> </h4>
<form>
  Enter the quantity of this medicine:
  <input type="number" name="quantity" required="required" min="1" max="50">
  <div align="center">
  	<input type="submit" class="btn-primary btn" value="ADD">
  </div>
</form>
</body>
</html>