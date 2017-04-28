<?php 

include_once '../../Application/RegisterInfo.php';

class DatabaseRegister
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
		
		$this->database = new DataBase($this->file_name2);
	}
	public function register($registerInfo)
	{
// 		echo $registerInfo->info->name;
	    $query = "INSERT INTO `USER`( `Password`, `Mail`, `Type`, `Language`) VALUES ('random shit','".$registerInfo->info->name."',1,1)";
	    $this->database->database_query($query);
	}
}
   
?>