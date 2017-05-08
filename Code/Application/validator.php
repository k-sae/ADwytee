<?php
include_once 'RegisterInfo.php';
include_once '../Database/register.php';
include_once 'PatientInfo.php';
include_once 'guest.php';
include_once 'LoginInfo.php';
include_once 'PharmacyInfo.php';
include_once 'Email_Config.php';
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
             $info->latitude = $_POST['lat'];
             $info->longitude= $_POST['long'];
             $data =$g->register($reginfo,$info);
             $mail =new Email();
             $subject = "register in ADwytee";
             $body = "thanks for register in ADwytee";
             $mail->SendEmail($_POST['email'],$subject,$body,"");
              // print json_encode($data);
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
             $info->name=$_POST['Name'];
             $info->notes=$_POST['notes'];
             $info->latitude = $_POST['lat'];
             $info->longitude= $_POST['long'];
             $info->describition=$_POST['describition'];
             $info->telephonNo=$_POST["telephone"];
             $data = $g->registerph($reginfo,$info);
             var_dump($data);
             print json_encode($data);
           }

             }if(isset($_POST["login"])) {
              $g=new Guest();
              $log=new loginInfo();
              $log->mail=$_POST["email"];
              $log->password=$_POST["password"];
              $arr = $g->login($log);
              var_dump($arr);
              if(sizeof($g->login($log)) == 0){
                echo '0';
              }else{
                $data[0] = $arr[0]['Type'];
                $data[1] = $arr[0]['Id'];
                print json_encode($data);
              }

             }





?>
