<?php
session_start();
if (!isset($_SESSION["language"])){
  $_SESSION["language"] ='en';
}
else {
if($_SESSION["language"] == 'en'){
$_SESSION["language"] ='ar';
}
else{
    $_SESSION["language"] ='en';
}
}
$dictionary_path = './dictionary/'.$_SESSION["language"].'.php';
include_once  $dictionary_path;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link rel="icon" href="../../favicon.ico"-->
<!--    <title>ADwytee</title>-->
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
          <a class="navbar-brand" href="index.php">ADwytee</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="Pharmacy.php">Pharmacy Profile</a></li>
            <li ><a href="orderPage.php"><?php echo  $language['orderpage']?></a></li>
            <li><a href="#about">About</a></li>
            <li ><a href="" data-toggle="modal" data-target="#myModal">Register</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Register</h4>
          </div>
          <div class="modal-body">
            <form><input type="" name=""></form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Register</button>
          </div>
        </div>
      </div>
    </div>
