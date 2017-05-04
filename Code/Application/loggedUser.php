<?php
include_once "../../Application/Info.php";
abstract class AbstractLoggedUser{
public $Userinfo;
public $id;
function __construct($info)
 	{
 		# code...
 		$this->info = $info;
 	

 	}
}
?>