<?php
/**
 *
 */
class MedicineOrder
{
  public $medicine_id;
  public $medicine_name;
  public $amount;
  public function setAmount($amount)
  {
  $this->amount =$amount;
  }
  public function setMedicine($medicine)
  {
    $this->medicine_name =$medicine;
  }
  public function getAmount()
  {
  return ($this->amount);
  }
  public function getMedicine()
  {
   return  ($this->medicine_name); 
  }

}

 ?>
