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
?>