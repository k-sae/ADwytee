<?php
include_once "../../Application/Info.php";
include_once '../../Application/LoginInfo.php';
include_once '../../Database/login&register.php';
 /**
 * 
 */
 class RegisterInfo
 {
 	public $info;
 	public $loginInfo;
 	function __construct($info, $loginInfo)
 	{
 		# code...
 		$this->info = $info;
 		$this->loginInfo = $loginInfo;
 		$dataBaseRegister= new DatabaseRegister();
 		$dataBaseRegister->register($this);

 	}
 }
?>