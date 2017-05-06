<?php
include_once 'RegisterInfo.php';
include_once 'PatientInfo.php';
include_once '../Database/register.php';
include_once 'PharmacyInfo.php';
class Guest
{ 
	public function register(RegisterInfo $reginfo,PatientInfo $info){
    $regp=new Register_Query();
    $regp->register($reginfo,$info);
	}
	public function registerph(RegisterInfo $reginfo,PharmacyInfo $info){
    $regp=new Register_Query();
    $regp->registerph($reginfo,$info);
	}


	public function Login(){
      
	}
}
?>