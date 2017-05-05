<?php
class Pharmacy_Query
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
  public function fetch_Pharmacy($id)
  { $result=array();
    $query = "SELECT `UserId`, `Name`, `Notes`, `Describition`, `Latitude`, `Longitude`, `Telephone` FROM `PHARMACY` WHERE `UserId` = $id";
    $result = $this->database->fetch_query($query);
    return $result;
  }
  public function fetch_PDetails($id)
  { $result=array();
    $query =" SELECT `FName`, `LName`, `Gender`, `Birthdate`, `Height`, `Weight`, `StreetNo`, `Gov`, `District`, `Telephone`, `Latitude`, `Longitude`,`Key` FROM `PATIENT` WHERE `UserId` = $id ";
    $result = $this->database->fetch_query($query);
    return $result;
  }
  public function fetch_BloodPressure($id)
  { $result=array();
    $query ="SELECT `systolic`, `diastolic`, `date` FROM `BLOOD_PRESSURE` WHERE `PatientId` = $id ";
    $result = $this->database->fetch_query($query);
    return $result;
  }
 public function fetch_Alergias($id)
  { $result=array();
    $query ="SELECT `Name`, `DOR`, `TOR`, `Notes` FROM `ALLERGY` WHERE `UserId` = $id ";
    $result = $this->database->fetch_query($query);
    return $result;
  }
  public function fetch_RISk($id)
  { $result=array();
    $query ="SELECT `RiskFactor` FROM `PATIENT_RISK_FACTOR` WHERE `PatientId` = $id ";
    $result = $this->database->fetch_query($query);
    return $result;
  }
   
  
  }

  ?>
