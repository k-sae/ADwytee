<?php 
class pharmacy{
private $file_name= '../../Database/pharmacy.php';
  private $pharmacy;

  function __construct()
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error";
    }

    $this->pharmacy = new Pharmacy_Query();
}
public function fetchmedicine($id){
return $this->pharmacy ->fetch_medicine($id);
}
public function fetch_medicine_info($code){
return $this->pharmacy ->fetch_medicine_info($code);
}
}




?>