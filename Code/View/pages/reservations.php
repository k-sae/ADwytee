<?php
$page = "reservations";
include_once '../../Application/reservation.php';

$reservation = new reservation();
if(isset($_POST['pId']) && isset($_POST['date'])){
  session_start();
  $reservation->add($_SESSION['userId'], $_POST['pId'], $_POST['date']);
  header("Location: reservations.php");
}elseif(isset($_POST['id']) && isset($_POST['date'])){
  $reservation->update($_POST['id'], $_POST['date']);
  header("Location: reservations.php");
}elseif(isset($_GET['id'])){
  $reservation->delete($_GET['id']);
}

include_once '../content/header.php';
?>

<div class="wrapper">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">

        <br><br>
        <h1><?php echo ($language['reservations']); ?></h1>
        <br><br>

        <button class="btn btn-lg btn-info" data-toggle='modal' data-target='#addreservation' onclick='fetchPharmacies()'><?php echo ($language['addreservation']); ?></button>

        <form action="" method="get">

          <table class="Resulttable" id ="reservation-table">
            <tr>
              <th colspan="2"><?php echo ($language['upcomingreservations']); ?></th>
            </tr>
            <tbody>

              <?php
                $results = $reservation->retrieve($_SESSION['userId']);
                echo '<script src = "../js/reservation.js">  </script>';
                if(sizeof($results) != 0){
                  for($i = 0; $i < sizeof($results); $i++){
                    echo "
                            <tr>
                              <td>
                                ".$language['date'].": ".$results[$i]['Date']." <br>  
                                ".$language['pharmacy'].": ".$results[$i]['Name']."
                              </td>
                              <td>
                                <i class='button-order edit-order fa fa-pencil' aria-hidden='true' data-toggle='modal' data-target='#editreservation' onclick='editReservaion(".$results[$i]['Id'].")'></i>
                                <i class='button-order delete-order fa fa-trash' aria-hidden='true' onclick='deleteReservation(".$results[$i]['Id'].",this)'></i>
                              </td>
                            </tr>";
                  }
                }else{
                  echo "<tr>
                          <td>". $language['noreservations']."</td>
                        </tr>";
                }

              ?>

            </tbody>
          </table>
        </form>


        <div class="modal fade" id="addreservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content register-dialog">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>                   </button>
                <h3><?php echo ($language['reserveconsultation']); ?></h3>
              </div>

              <div class="modal-body">
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-lg-4 col-lg-offset-4">
                      <div class="row">
                        <div class="form-group">
                          <label><?php echo ($language['choosepharmacy']); ?></label>
                          <select id="pharmacySelect" name="pId" class="form-control">

                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="form-group">
                          <label><?php echo ($language['choosedate']); ?></label>
                          <input type="datetime-local" id="date" name="date" required="required" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary" type="submit"><?php echo ($language['reserve']); ?></button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade" id="editreservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content register-dialog">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3><?php echo ($language['editreservation']); ?></h3>
              </div>
              <div class="modal-body">
                <form method="POST">
                  <input type="hidden" name="id" id="id" value=""/>
                  <div class="row">
                    <div class="form-group col-lg-4 col-lg-offset-4">
                      <label><?php echo ($language['editdate']); ?></label>
                      <input type="datetime-local" id="date" name="date" required="required" class="form-control">
                    </div>
                  </div>
                  <button class="btn btn-primary" type="submit"><?php echo ($language['edit']); ?></button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php
include '../content/footer.php';
?>
