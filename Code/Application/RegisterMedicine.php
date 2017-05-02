<?php

include_once 'Medicine.php';

class RegisterMedicine{

  private $file_name= '../../Database/RegisterMedicine.php';
  private $register;

  function __construct()
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error in file name";
    }

    $this->register = new RegisterMedicine_Query();
    

  }

  public function register($phId, $medicine, $amount)
  {
    $this->register->register($phId, $medicine, $amount);

  }
  public function add($phId, $medicine, $amount)
  {
    if(sizeof(($this->register->check($phId, $medicine))) == 0){
      $this->register->insert($phId, $medicine, $amount);
    }else{
      $this->register->add($phId, $medicine, $amount);
    }
  }

}

?>