<?php

include_once 'Medicine.php';

class RegisterMedicine{

  private $file_name= '../../Database/RegisterMedicine.php';
  private $register;
  private $medicine;

  function __construct($medicine)
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error in file name";
    }

    $this->medicine = $medicine;
    $this->register = new RegisterMedicine_Query();
    $this->register();

  }

  public function register()
  {
    $this->register->register($this->medicine);

  }

}

?>