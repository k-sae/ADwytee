<?php
include_once 'RegisterInfo.php';
include_once '../Database/register.php';
include_once 'PatientInfo.php';
include_once 'guest.php';
            if(isset($_POST["regp"])){
			$p=new Register_Query();
			$num=$p->registervalidate($_POST['email']);
                if(count($num)==1){
                  echo "1";
                }else{
             $g=new Guest();
             $reginfo= new RegisterInfo();
             $reginfo->info = new Info();
             $reginfo->loginInfo = new LoginInfo();
             $reginfo->$loginInfo->mail=$_POST['email'];
             $reginfo->$loginInfo->password=$_POST['password']; 
             $reginfo->$info->telephonNo=$_POST["phone_number"];
             $info=new PatientInfo();
             $info->$fName=$_POST["fName"];
             $info->$lNAme=$_POST["lName"];
             $info->$goverment=$_POST["goverment"];
             $info->$district=$_POST["district"];
             $info->$street_No=$_POST["street_no"];
             $g->register($reginfo,$info);

                }
                 
            
             }    
            
		



?>
