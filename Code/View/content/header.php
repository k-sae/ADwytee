<?php

include_once 'language.php';
include_once '../../Application/NotificationManger.php';

if ((!isset($_GET["lat"]) && !isset($_SESSION["latitude"])) || (!isset($_GET["long"]) && !isset($_SESSION["longitude"]))) {
  echo ' <script src="../js/Location.js"></script> ';
  echo ' <script> getLocation(); </script> ';
}
else if (!isset($_GET["lat"]) || !isset($_GET["lat"])) {
  $_SESSION["latitude"] = $_SESSION["latitude"];
  $_SESSION["longitude"] = $_SESSION["longitude"];
  //session_destroy();
}else{
 $_SESSION["latitude"] =  $_GET["lat"];
 $_SESSION["longitude"] = $_GET["long"];
}
$notification =  new NotificationManger();
$N_Status = $notification->check_Notification(1);
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION["language"]; ?>" style = "min-height: 100vh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!--link rel="icon" href="../../favicon.ico"-->

    <title><?php echo  $language['logo']?></title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/bugfix.css" rel="stylesheet">
    <link href="../css/default.css" rel="stylesheet">



  </head>
  <body dir = <?php echo $dir?>  style = "min-height: 100vh">
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
            <li class="notification<?php if($N_Status == True) echo ' n-active';?>" id="noti"> <i class="fa fa-globe fa-2x " aria-hidden="true"></i></li>
            <li class="<?php if($page=="stat"){echo "active";}?>"><a href="statistics.php">Statistics</a></li>
            <li ><a href="Pharmacy.php"><?php echo  $language['pharmacyprofile']?></a></li>
            <li class="<?php if($page=="orderPage"){echo "active";}?>"><a href="orderPage.php"><?php echo  $language['orderpage']?></a></li>
            <li class="<?php if($page=="pharmacyorder"){echo "active";}?>"><a href="pharmacyOrder.php"><?php echo  $language['pahrmacyorder']?></a></li>
            <li><a href="#about"><?php echo  $language['about']?></a></li>
            <li ><a href="" data-toggle="modal" data-target="#myModal"><?php echo  $language['login']?></a></li>
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
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content register-dialog">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>                   </button>
                 <h4 class="modal-title" id="myModalLabel"><?php echo  $language['login']?></h4>
                </div>
                <div class="modal-body">
                  <form method="POST" id="login-form">
                   <input type="email" name="email" placeholder="Email">
                    <br>
                    <input type="password" name="password" placeholder="Password">
                    <br>
                    <button type="button" class="btn btn-primary" type="submit" onclick="loginfunction()" name="login"><?php echo  $language['login']?></button>
                  </form>
                  <p>No Acount yet? <a href="../pages/RegisterPage.php">Please register </a><p>
                </div>

                <div class="modal-footer" id="hi">
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <!-- <button type="button" class="btn btn-primary"><?php echo  $language['login']?></button> -->
                </div>
              </div>
            </div>

         </div>
