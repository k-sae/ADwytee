<?php
session_start();
if(isset($_SESSION['userType'])){
  session_destroy();
  header("Location: index.php");
}
?>