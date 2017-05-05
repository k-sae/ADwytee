<?php


class statistics_Query
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

    public function fetch_stat()
    {
      $query = "SELECT p.Name, m.EnName, m.Code, COUNT(o.status) AS NumberOfOrders, CURRENT_TIMESTAMP AS Time
                FROM `PHARMACY`AS p
                INNER JOIN `ORDER` AS o ON o.PharmacyId = p.UserId 
                INNER JOIN `MEDICINE_ORDER`AS mc ON mc.OrderId = o.Id
                INNER JOIN `MEDICINE`AS m ON mc.MedicineCode = m.Code
                
                WHERE o.status = 3
                GROUP BY m.EnName, p.Name
                ORDER BY NumberOfOrders DESC, m.EnName ASC";

      $result = $this->database->fetch_query($query);

      return $result;

    }
}

?>
