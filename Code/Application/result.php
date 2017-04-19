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
      for($i=0; $i< sizeof($result_arr); $i++){
	       $result = "<tr>
                     <td>1</td>
                     <td> " . $result_arr[$i]['Name'] . " </td>
                     <td>
                      <i>Order</i>
                     </td>
                    </tr>";

        echo $result;
      }
    } else {
      echo "no results found";
    }
    echo "<br><br>";
    print_r($result_arr);
    //echo $reselt[0]["Name"];
    //var_dump ($reselt);
  }
}
?>
