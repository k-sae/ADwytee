<?php
if (!isset($_GET['code']))
{
	header("Location: index.php");
	exit();
}
include_once '../content/header.php';
include_once '../../Database/MedicineFetcher.php';
include_once '../../Application/order.php';
include_once '../../Application/orderManger.php';
include_once '../../Application/medicineOrder.php';
$medicinFetcher = new MedicineFetcher();
$arr =  $medicinFetcher->fetch($_GET['code'])[0];
if (isset($_POST['newOrder']))
{
	//TODO
	$order = new Order();
	$medicine_order = new MedicineOrder();
	$medicine_order->medicine_id = ($_GET['code']);
	$medicine_order->amount = 1;
	$order->medicine_order = $medicine_order;
	$order->pharmacy = ($_GET["phar"]);
	//TODO edit this according to session later
	$order->user = ($_SESSION['userId']);
	$orderManager = new orderManger();
	$orderManager->newOrder($order);
}
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
<!--               adding time to prevent image cashing -->
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../mimages/<?php echo $_GET['code']?>?t=<?php echo time()?>" class="img-circle img-responsive"> 
                	<?php 
                	if (isset($_SESSION["userType"]) && $_SESSION["userType"] == 2)
                	{
                	echo 
                	"<form action='upload.php' method='post' enctype='multipart/form-data'>
					    <input type='file' name='fileToUpload' class='select-file'  id='fileToUpload' >
					    <input type='hidden' name='m_code' value='".$_GET['code']."' >
						<input type='hidden' name='last' value='".$_SERVER['REQUEST_URI']."' >
					    <br>
					    <input type='submit' value='Upload' class='btn btn-primary' name='submit'>
					</form>";
					}
                	?>
                 </div>

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
                        <td><?php echo  $language['name']; ?></td>
                        <td><?php echo $arr["EnName"] ?></td>
                      </tr>
                      <tr>
                        <td><?php echo  $language['code']; ?></td>
                        <td><?php echo $arr["Code"] ?></td>
                      </tr>
                      <tr>
                        <td><?php echo  $language['desc']; ?></td>
                        <td><?php echo $arr["Descripton"] ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <form method="post">
                  <?php if (isset($_GET["phar"]) && isset($_SESSION['userId']))
                   echo "
                  <input type='submit' name='newOrder' class='btn btn-primary' value='Order Now'>"?>
                  </form>
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
