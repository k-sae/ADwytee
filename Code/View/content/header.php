<?php
session_start();


//THE DEFUALT LANGUAGE
if (!isset($_POST["lang"]) && !isset($_SESSION["language"])){
  $_SESSION["language"] = "en";
//WHEN NAVIGATIONG TO ANOTHER PAGE
} else if (!isset($_POST["lang"])) {
  //$_SESSION["language"] = $_SESSION["language"];
//WHEN REFRESHING OR CHANGING THE LANGUAGE
} else {
  $_SESSION["language"] = $_POST["lang"];
}
$dictionary_path = './dictionary/'.$_SESSION["language"].'.php';
include_once  $dictionary_path;
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION["language"]; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link rel="icon" href="../../favicon.ico"-->

    <title><?php echo  $language['logo']?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bugfix.css" rel="stylesheet">
    <link href="../css/default.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><?php echo  $language['logo']?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="Pharmacy.php"><?php echo  $language['pharmacyprofile']?></a></li>
            <li ><a href="orderPage.php"><?php echo  $language['orderpage']?></a></li>
            <li><a href="#about"><?php echo  $language['about']?></a></li>
            <li ><a href="" data-toggle="modal" data-target="#myModal"><?php echo  $language['register']?></a></li>
            <li><a href="#contact"><?php echo  $language['contact']?></a></li>
            <li>
            <form method="post">
              <select id="langlist" name="lang" onchange="this.form.submit()" class="langselect">
                <option dir="rtl" value="ar"> عربى </option>
                <option dir="ltr" value="en"> English </option>
              </select>
              <script>
                document.getElementById('langlist').value = "<?php echo $_SESSION["language"]; ?>";
              </script>
            </form>

          </li>
          </ul>
        </div>
      </div>
    </nav>
