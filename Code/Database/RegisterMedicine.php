<?php 

class RegisterMedicine_Query
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

	public function register($medicine)
	{

	    $query = "INSERT INTO `MEDICINE`( `Code`, `EnName`, `ArName`, `Descripton`) VALUES ('".$medicine->Code."','".$medicine->EnName."','".$medicine->ArName."','".$medicine->Description."')";

	    $this->database->database_query($query);
	}
}
   
?>