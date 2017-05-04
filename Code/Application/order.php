<?php
/**
 *
 */
class Order
{
  private $id;
  private $date;
  private $user;
  private $pharmacy;
  private $status;
  private $medicine_order;
  public function setId($id)
  {
    $this->id =$id;
  }
  public function setUser($userid)
  {
    $this->userId =$userid;
  }

  public function setPharmacy($pharmacyId)
  {
    $this->pharmacyId =$pharmacyId;
  }
  public function setDate($date)
  {
    $this->date =$date;
  }
  public function setStatus($status)
  {
    $this->status =$status;
  }
  public function setMedicine($medicine)
  {
    $this->medicine_order = $medicine;
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
