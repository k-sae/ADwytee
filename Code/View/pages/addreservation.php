<?php
$page = "reservations";
include '../content/header.php';
?>

<div class="wrapper">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">
      <div class="cover-container">
        <br><br>
        <h1>Reserve a consultation</h1>
        <br><br>

        <form action="reservations.php" method="get">

          <div class="col-lg-4 col-lg-offset-4">

            <div class="row">
              <div class="form-group">
                <label>Choose the Pharmacy</label>
                <input type="text" id="pName" name="pName" placeholder="Pharmacy name" required="required" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label>Choose the time of consultation</label>
                <input type="datetime-local" id="date" name="date" placeholder="" required="required" class="form-control">
              </div>
            </div>

            <button type="submit" class="btn btn-lg btn-info">Reserve</button>

          </div>

        </form>

      </div>
    </div>
  </div>
</div>

<?php
include '../content/footer.php';
?>
