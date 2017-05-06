<?php
include_once 'RegisterInfo.php';
include_once '../Database/register.php';
include_once 'PatientInfo.php';
include_once 'guest.php';
include_once 'LoginInfo.php';
include_once 'PharmacyInfo.php';
            if(isset($_POST["regp"])){
			$p=new Register_Query();
			$num=$p->registervalidate($_POST['email']);
                  $num1=$p->registerphonevalidate($_POST['phone_number']);
                if(count($num)==1||count($num1)==1){
                  echo "1";
                }else{
             $g=new Guest();
             $reginfo= new RegisterInfo();
             $reginfo->info = new Info();
             $reginfo->loginInfo = new LoginInfo();
             $reginfo->loginInfo->mail=$_POST['email'];
             $reginfo->loginInfo->password=$_POST['password']; 
             $info=new PatientInfo();
             $info->fName=$_POST["FName"];
             $info->lName=$_POST["LName"];
             $info->telephonNo=$_POST["phone_number"];
             $info->goverment=$_POST["government"];
             $info->district=$_POST["district"];
             $info->street_No=$_POST["street_no"];
             $g->register($reginfo,$info);
             

                } 
             }
            if(isset($_POST["regph"])) {
                  $p=new Register_Query();
                  $num=$p->registervalidate($_POST['email']);
                  $num1=$p->registerphonevalidate($_POST['telephone']);
                if(count($num)==1||count($num1)==1){
                  echo "1";
                }else{
            $g=new Guest();
             $reginfo= new RegisterInfo();
             $reginfo->info = new Info();
             $reginfo->loginInfo = new LoginInfo();
             $reginfo->loginInfo->mail=$_POST['email'];
             $reginfo->loginInfo->password=$_POST['pass']; 
             $info= new PharmacyInfo(); 
             $info->notes=$_POST['notes'];
             $info->describition=$_POST['describition'];
             $info->telephonNo=$_POST["telephone"];
             $g->registerph($reginfo,$info);}

             }  
            
		



?>
