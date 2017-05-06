<?php

class reservation_Query
{
  private $file_name ='DataBase.php';
  private $database;
  private $file_name2= 'credential.php';
  function __construct()
  {
    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error";
    }

    $this->database = DataBase :: getInstance($this->file_name2);
  }

  public function add_reservation($userId, $pId, $date)
  {
    $query = "INSERT INTO `RESERVATION` (`UserId`, `PharmacyId`, `Date`)
              VALUES ('$userId', '$pId', '$date')";

    $this->database->database_query($query);

  }
  public function update_reservation($id, $date)
  {
    $query = "UPDATE `RESERVATION` 
              SET `Date` = '$date'
              WHERE `Id` = $id";

    $this->database->database_query($query);

  }
  public function delete_reservation($id)
  {
    $query = "DELETE FROM `RESERVATION` WHERE Id = $id";

    $this->database->database_query($query);

  }
  public function retrieve_reservation($userId)
  {
    $query = "SELECT r.Id, r.PharmacyId, r.Date, p.Name, CURRENT_TIMESTAMP AS cDate
              FROM `RESERVATION` AS r
              INNER JOIN `PHARMACY` AS p ON p.UserId = r.PharmacyId
              WHERE r.UserId = $userId
              ORDER BY r.Date";

    $result = $this->database->fetch_query($query);

    return $result;

  }
}

?>
