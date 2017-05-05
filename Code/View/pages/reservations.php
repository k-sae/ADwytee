<?php
$page = "reservations";
include '../content/header.php';
include_once '../../Application/reservation.php';

$reservation = new reservation();
$userId = 1;
if(isset($_GET['pName']) && isset($_GET['date'])){
  $reservation->add($userId, $_GET['pName'], $_GET['date']);
}elseif(isset($_GET['id']) && isset($_GET['date'])){
  $reservation->update($_GET['id'], $_GET['date']);
}elseif(isset($_GET['id'])){
  $reservation->delete($_GET['id']);
}

?>

<div class="wrapper">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">
        <br><br>
        <h1>Reservations</h1>
        <br><br>

        <a href="addreservation.php" class="btn btn-lg btn-info">Add Reservation</a>

        <form action="" method="get">

          <table class="Resulttable">
            <tr>
              <th colspan="2">Upcoming Reservations</th>
            </tr>
            <tbody>

            <?php
            $results = $reservation->retrieve(1);

            if(sizeof($results) != 0){
              for($i = 0; $i < sizeof($results); $i++){

                echo "
                            <tr>
                              <td>
                                ".($i+1) .". On " . $results[$i]['Date'] . "
                                with ". $results[$i]['Name'] ." pharmacy
                              </td>
                              <td>
                                <i class='button-order edit-order fa fa-pencil' aria-hidden='true'></i>
                                <i class='button-order delete-order fa fa-trash' aria-hidden='true'></i>
                              </td>
                            </tr>";
              }
            } else {
              echo "<tr>
                            <td>". $language['noresults']."</td>
                          </tr>";
            }

            ?>

            </tbody>
          </table>
        </form>

      </div>
    </div>
  </div>
</div>

<?php
include '../content/footer.php';
?>
