<?php
error_reporting(0);

class result{

  private $file_name= '../../Database/result.php';
  private $result;
  private $medicine;

  function __construct($medicine)
  {

    try {
      include_once $this->file_name ;
    } catch (Exception $e) {
      echo "error in file name";
    }

    $this->result = new result_Query();
    $this->medicine = $medicine;
    $this->fetch($this->medicine);

  }

  public function fetch($str)
  {


    $result_arr = $this->result->fetch_pharmaces($str);
    

    if(sizeof($result_arr) != 0){
      $this->sort($result_arr);
      for($i=0; $i< sizeof($result_arr); $i++){
        $distance = $this->getDistance(30.0110797,31.1886828, $result_arr[$i]['Latitude'],$result_arr[$i]['Longitude'], "K");
	      $result = "<tr>
                     <td> " . number_format($distance,2) . " </td>
                     <td> " . $result_arr[$i]['Name'] . " </td>
                     <td>
                      <i>Order</i>
                     </td>
                    </tr>";

        echo $result;
      }
    } else {
      echo "<tr>
              <td>no results found</td>
            </tr>";
    }
  }


  private function getDistance($lat1, $lon1, $lat2, $lon2, $unit) {

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
        
        $distance1 = $this->getDistance(30.0110797,31.1886828, $array[($j-1)]['Latitude'],$array[($j-1)]['Longitude'], "M");
        $distance2 = $this->getDistance(30.0110797,31.1886828, $array[$j]['Latitude'],$array[$j]['Longitude'], "M");

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
