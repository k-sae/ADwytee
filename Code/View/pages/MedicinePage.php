<?php
include_once '../content/header.php';
include_once '../../Database/MedicineFetcher.php';
$medicinFetcher = new MedicineFetcher();
$arr =  $medicinFetcher->fetch(1)[0];
?>

<div class="container medicine-page-container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
          <div class="panel panel-info medicine-page-panel">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $arr["EnName"] ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../images/m1.png" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><?php echo  $language['medicineenname']; ?></td>
                        <td><?php echo $arr["EnName"] ?></td>
                      </tr>
                      <tr>
                        <td><?php echo  $language['medicinearname']; ?></td>
                        <td><?php echo $arr["ArName"] ?></td>
                      </tr>
                      <tr>
                        <td><?php echo  $language['desc']; ?></td>
                        <td><?php echo $arr["Descripton"] ?></td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">Order Now</a>
                </div>
              </div>
            </div> 
<!--             i dont need it right now -->
<!--                  <div class="panel-footer"> -->
<!--                         <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
<!--                         <span class="pull-right"> -->
<!--                             <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a> -->
<!--                             <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
<!--                         </span> -->
<!--                     </div> -->
            
          </div>
        </div>
      </div>
    </div>
    
<?php
include '../content/footer.php';
?>
    </body>
</html>