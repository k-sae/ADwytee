<?php
/**
 *
 */
class Order
{
  private $id;
  private $date;
  private $userId;
  private $pharmacyId;
  private $status;
  private $medicine_order;
  public function setId($id)
  {
    $this->id =$id;
  }
  public function setUserId($userid)
  {
    $this->userId =$userid;
  }

  public function setPharmacyId($pharmacyId)
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
  public function getPharmacyId()
  {
   return $this->pharmacyId;
  }
 public function getUserId()
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
