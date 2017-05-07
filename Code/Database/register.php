<?php 

include_once '../Application/RegisterInfo.php';
include_once '../Application/PatientInfo.php';
include_once '../Application/PharmacyInfo.php';
include_once '../Application/LoginInfo.php';

class Register_Query
{
	private $file_name ='DataBase.php';
	private $database;
	private $file_name2= 'credential.php';
	function __construct()
	{
		try {
			include_once $this->file_name ;
		} catch (Exception $e) {
			echo "error in file name";
		}
		

     $this->database = DataBase :: getInstance($this->file_name2);
	}
	public function registervalidate($email)
	{
	$result=array();
    $query ="SELECT `Mail` FROM `USER` WHERE `Mail` LIKE '$email' ";
    $result = $this->database->fetch_query($query);
    return $result;
	}
	public function registerphonevalidate($phone)
	{
		$result=array();
    $query ="SELECT `Telephone` FROM `PATIENT`, `PHARMACY` WHERE `Telephone` LIKE '$phone' ";
    $result = $this->database->fetch_query($query);
    return $result;
	}

	public function register(RegisterInfo $reginfo,PatientInfo $pinfo)
	{
		$mail=$reginfo->loginInfo->mail;
		$pass=$reginfo->loginInfo->password;
		$query ="INSERT INTO `USER` (`Id`, `Password`, `Mail`, `Type`, `Language`) VALUES (NULL, '$pass', '$mail', '3', '1')";
		 $this->database->database_query($query);
		$id = mysqli_insert_id($this->database->get_con());
		$key=md5($id);
		$fname=$pinfo->fName;
		$lname=$pinfo->lName;
		$tele=$pinfo->telephonNo;
		$gov=$pinfo->goverment;
		$dis=$pinfo->district;
		$str=$pinfo->street_No;
		$query1="INSERT INTO `PATIENT` (`Key`, `FName`, `LName`, `Gender`, `Birthdate`, `Height`, `Weight`, `StreetNo`, `Gov`, `District`, `Telephone`, `UserId`, `Latitude`, `Longitude`) VALUES ('$key', '$fname', '$lname', '1', '2017-05-02', '0', '0', '$str', '$gov', '$dis', '$tele', '$id', '0', '0')";
        $this->database->database_query($query1);
        //$this->database->fetch_query($query1);
          
        
   
	}
	public function registerph(RegisterInfo $reginfo,PharmacyInfo $pinfo)
	{
		$mail=$reginfo->loginInfo->mail;
		$pass=$reginfo->loginInfo->password;
		$query ="INSERT INTO `USER` (`Id`, `Password`, `Mail`, `Type`, `Language`) VALUES (NULL, '$pass', '$mail', '2', '1')";
		 $this->database->database_query($query);
		$id = mysqli_insert_id($this->database->get_con());
		$key=md5($id);
		$query1="INSERT INTO `PHARMACY` (`Key`, `UserId`, `Name`, `Notes`, `Describition`, `Latitude`, `Longitude`, `Telephone`) VALUES ('$key', '$id', '$pinfo->name', '$pinfo->notes', '$pinfo->describition', '0', '0', '$pinfo->telephonNo');";
        $this->database->database_query($query1);
        //$this->database->fetch_query($query1);
          
        
   
	}
	public function login(LoginInfo $loginfo)
	{
	$result=array();
    $query ="SELECT `Id` FROM `USER` WHERE `Password` LIKE '$loginfo->password' AND `Mail` LIKE '$loginfo->mail' ";
    $result = $this->database->fetch_query($query);
    return $result;
    }
}
?>