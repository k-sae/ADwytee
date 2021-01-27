<?php
include '../content/header.php';
include '../../Application/LoginInfo.php';
?>
  <div class="wrapper">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <div class="search">
            <form action="resultpage.php" method="get">
              <div class="input-group">
                <input class="form-control" name="result" placeholder="<?php echo $language['search']?>" type="text" autocomplete="off" required="required" onkeyup="showResult(this.value)">
                <span class="input-group-addon">
                  <button type="submit" id="searchbtn"><i class="fa fa-search"></i></button>
                </span>
              </div>
              <div id="livesearch"></div>
            </form>
          </div>

        </div>
      </div>
    </div>

  </div>




<?php
include '../content/footer.php';
?>
