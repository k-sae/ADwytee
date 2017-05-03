<?php


class result_Query
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

  public function fetch_pharmaces($str)
  {

    $query = "SELECT m.Code, p.Name, m.EnName, p.Latitude, p.Longitude, pm.Amount 
              FROM `PHARMACY`AS p
              INNER JOIN USER AS u ON p.UserId = u.Id
              INNER JOIN USERTYPE AS ut ON u.Type = ut.Id
              INNER JOIN PHARMACY_MEDICINE AS pm ON p.UserId = pm.PharmacyId

              INNER JOIN MEDICINE as m ON (pm.MedicineCode) = (m.Code) 
              AND (m.EnName = '$str' OR m.ArName = '$str' OR m.Code = '$str')";
              
    $result = $this->database->fetch_query($query);

    return $result;

  }
}

?>