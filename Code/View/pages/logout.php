<?php
session_start();
if(isset($_SESSION['userType']) && isset($_SESSION['userId'])){
  session_destroy();
  header("Location: index.php");
}
?>