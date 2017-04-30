<?php
session_start();

//THE DEFUALT LANGUAGE
if (!isset($_POST["lang"]) && !isset($_SESSION["language"])){
  $_SESSION["language"] = "en";
//WHEN NAVIGATING TO ANOTHER PAGE
} else if (!isset($_POST["lang"])) {
  //$_SESSION["language"] = $_SESSION["language"];
//WHEN REFRESHING OR CHANGING THE LANGUAGE
} else {
  $_SESSION["language"] = $_POST["lang"];
}

if($_SESSION["language"] == "en"){
  $dir = "ltr";
}else
  $dir = "rtl";
  $dictionary_path = './dictionary/'.$_SESSION["language"].'.php';
  include_once  $dictionary_path;

include_once '../../Application/orderManger.php';
$orderManger =new orderManger();

if(isset($_GET["id"])){

  $id = $_GET["id"];

  $message= $orderManger->checkorder($id);

  echo $message;
  if($message != True){
    echo $language['deletedone'];
  }
  else {
    echo $language['refresh'];
  }
}

 ?>
