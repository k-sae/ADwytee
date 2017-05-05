<?php 

include_once '../Application/RegisterInfo.php';
include_once '../Application/PatientInfo.php';

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
	public function register(RegisterInfo $reginfo,PatientInfo $pinfo)
	{
		$query ="INSERT INTO `USER` (`Id`, `Password`, `Mail`, `Type`, `Language`) VALUES (NULL, '$reginfo->$Logininfo->pass', '$reginfo->$Logininfo->$mail', '1', '1')";
        $result = $this->database->fetch_query($query);
   
	}
}

?>
