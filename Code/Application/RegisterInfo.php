<?php
include_once "Info.php";
 /**
 * 
 */
 class RegisterInfo
 {
 	public $info;
 	public $loginInfo;
 	function __construct()
 	{
 		# code...
 		$this->info = new Info();
 	}
 }
?>