<?php

$medicine = $_GET["result"];
//echo $medicine;
include_once 'language.php';

?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION["language"]; ?>">
<head>
	<title></title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bugfix.css" rel="stylesheet">
</head>
<body style="background-color: #fff;" align="center" dir = <?php echo $dir?> >
<h4> <div align="center"><?php echo $medicine; ?></div> </h4>
<form action="Pharmacy.php" method="post" target="_top">
  <?php echo $language['entertheamount']; ?>:
  <input type="hidden" name="medicine" value="<?php echo $medicine; ?>"/>
  <input type="number" name="amount" required="required" min="1" max="50">
  <div align="center">
  	<input type="submit" class="btn-primary btn" value="<?php echo $language['add']; ?>">
  </div>
</form>
</body>
</html>