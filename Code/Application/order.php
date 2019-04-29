<?php
/**
 *
 */
class Order
{
  public $id;
  public $date;
  public $user;
  public $pharmacy;
  public $status;
  public $medicine_order;
  public function setId($id)
  {
    $this->id =$id;
    return this;
  }
  
  public static function orderBuilder()
  {
    return new Order();
  }

  public function setUser($userid)
  {
    $this->userId =$userid;
    return $this;
  }

  public function setPharmacy($pharmacyId)
  {
    $this->pharmacyId =$pharmacyId;
    return $this;
  }
  public function setDate($date)
  {
    $this->date =$date;
    return $this;
  }
  public function setStatus($status)
  {
    $this->status =$status;
    return $this;
  }
  public function setMedicine($medicine)
  {
    $this->medicine_order = $medicine;
    return $this;
  }
   public function getId()
  {
    return $this->id;
  }
  public function getPharmacy()
  {
   return $this->pharmacyId;
  }
 public function getUser()
 {
  return $this->userId;
 }
 public function getDate()
 {
 return $this->date;
 }
 public function getStatus()
 {
 return $this->status;
 }
 public function getMedicine()
 {
 return $this->medicine_order;
 }
 public function tostring()
 {
   return (serialize($this));
 }
 public static function fromstring($str)
 {
   return (unserialize($str));
 }
}

 ?>
