<?php
include_once '../../Application/RegisterInfo.php';

class MedicineFetcher
{
	private $database_file_location ='../../Database/DataBase.php';
	private $database;
	private $medicine_file_location= '../../Application/Medicine.php';
	private $credentials_file_location = 'credential.php';
	function __construct()
	{
		try {
			include_once $this->database_file_location;
		} catch (Exception $e) {
			echo "error in file name";
		}
		
		$this->database = DataBase::getInstance($this->credentials_file_location);
	}
	public function fetch($code)
	{
		$query = "SELECT * FROM `MEDICINE` WHERE Code = ".$code;
		return $this->database->fetch_query($query);
	}
}

?>