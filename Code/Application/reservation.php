<?php

class reservation{

  private $file_name= '../../Database/reservation.php';
  private $reservation;

  function __construct()
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error";
    }

    $this->reservation = new reservation_Query();

  }

  public function add($userId, $pId, $date)
  {
    $this->reservation->add_reservation($userId, $pId, $date);
  }
  public function update($id, $date)
  {
    $this->reservation->update_reservation($id, $date);
  }
  public function delete($id)
  {
    $this->reservation->delete_reservation($id);
  }
  public function retrieve($userId)
  {
    $result = $this->reservation->retrieve_reservation($userId);

    for ($i=0; $i<sizeof($result); $i++){
      if ($result[$i]['Date'] < $result[$i]['cDate']){
        $this->delete($result[$i]['Id']);
      }
    }

    return $this->reservation->retrieve_reservation($userId);
  }

}

?>