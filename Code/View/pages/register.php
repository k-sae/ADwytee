<?php
include_once '../../Application/validator.php';
$validator = new Validator();
if(isset($_POST["regp"])){
  echo "string";
 $validator->register_patient($_POST["regp"]);
 }
if(isset($_POST["regph"])) {
  $validator->register_pharmacy($_POST["regph"]);
}
 }if(isset($_POST["login"])) {
    $validator->login($_POST["login"]);
 }
 ?>
