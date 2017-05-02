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

	public function register($phId, $medicine, $amount)
	{

	    $query = "INSERT INTO `MEDICINE`( `Code`, `EnName`, `ArName`, `Descripton`) VALUES ('".$medicine->getCode()."','".$medicine->getEnName()."','".$medicine->getArName()."','".$medicine->getDescription()."')";

	    $this->database->database_query($query);

	    $this->insert($phId, ($medicine->getEnName()), $amount);
	}

	public function check($phId, $medicine)
	{

	    $query = "SELECT * FROM `PHARMACY_MEDICINE`
	    					WHERE `PharmacyId` =  ". $phId ."
	    					AND `MedicineCode` = (SELECT `Code` FROM `MEDICINE` WHERE EnName = '".$medicine."')";

	    return ($this->database->fetch_query($query));
	}

	public function add($phId, $medicine, $amount)
	{

	    $query = "UPDATE `PHARMACY_MEDICINE`
	    					SET `Amount` = `Amount` + ".$amount."
	    					WHERE `PharmacyId` =  ". $phId ."
	    					AND `MedicineCode` = (SELECT `Code` FROM `MEDICINE` WHERE EnName = '".$medicine."')";

	    $this->database->database_query($query);
	}

	public function insert($phId, $medicine, $amount)
	{

	    $query = "INSERT INTO `PHARMACY_MEDICINE` (`PharmacyId`, `MedicineCode`, `Amount`)
	    					VALUES ('". $phId ."', (SELECT `Code` FROM `MEDICINE` WHERE EnName = '".$medicine."'), '". $amount ."')";

	    $this->database->database_query($query);
	}
}
   
?>