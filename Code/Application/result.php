<<?php
//error_reporting(0);

class result{

  private $file_name= '../../Database/result.php';
  private $result;

  function __construct()
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error in file name";
    }

    $this->result = new result_Query();

  }

  public function fetch($str)
  {
    $result_arr = $this->result->fetch_pharmaces($str);
    $this->sort($result_arr);

    return $result_arr;
    
  }


  public function getDistance($lat1, $lon1, $lat2, $lon2, $unit) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);

    $miles = $dist * 60 * 1.1515;
    $kilometers = $miles * 1.609344;
    $meters = $kilometers * 1000;

    $unit = strtoupper($unit);

    if ($unit == "K") {
      return $kilometers;
    } else if ($unit == "M") {
      return $meters;
    } else {
      return $miles;
    }
  }

  private function sort(&$array){

    for($i=0; $i< sizeof($array); $i++){
      for($j=1; $j< (sizeof($array)-$i); $j++){
        
        $distance1 = $this->getDistance($_SESSION['latitude'],$_SESSION['longitude'], $array[($j-1)]['Latitude'],$array[($j-1)]['Longitude'], "M");
        $distance2 = $this->getDistance($_SESSION['latitude'],$_SESSION['longitude'], $array[$j]['Latitude'],$array[$j]['Longitude'], "M");

        if($distance1 > $distance2){
          $this->swaparray($array, ($j-1), $j);
        }

      }
    }

  }

  private function swaparray(&$array, $origin, $destination) {
    $temp = $array[$origin];
    $array[$origin] = $array[$destination];
    $array[$destination] = $temp;
  }

}
?>
