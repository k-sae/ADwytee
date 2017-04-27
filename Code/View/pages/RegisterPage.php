<?php
include_once '../content/header.php';
include_once '../../Application/Register.php';
include_once '../../Application/RegisterInfo.php';
//remove this
$info = new Info();
if(isset($_POST["FName"]))
{
	$info->name = $_POST["FName"];
    $registerInfo = new RegisterInfo($info, new LoginInfo());
}
?>

<div class="container reg-container">
    <h1 class="well register-dialog">Registration Form</h1>
	<div class="col-lg-12 well register-dialog" >
	<div class="row">
				<form method="post" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label><?php echo  $language['first_name']; ?></label>
								<input type="text" id="FName" name="FName" placeholder="<?php echo  $language['enter_first_name_here']; ?>" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label><?php echo  $language['last_name']; ?></label>
								<input type="text"  name="LName" placeholder="<?php echo  $language['enter_last_name_here']; ?>" class="form-control">
							</div>
						</div>					
						<div class="row">
							<div class="col-sm-4 form-group">
								<label><?php echo  $language['goverment']; ?></label>
								<input type="text" placeholder="<?php echo  $language['enter_governemnt_name_here']; ?>" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label><?php echo  $language['district']; ?></label>
								<input type="text" placeholder="<?php echo  $language['enter_district_name_here']; ?>" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label><?php echo  $language['street_no']; ?></label>
								<input type="text" placeholder="<?php echo  $language['enter_street_no_here']; ?>" class="form-control">
							</div>		
						</div>
					<!-- 	<div class="row">
							<div class="col-sm-6 form-group">
								<label>Title</label>
								<input type="text" placeholder="Enter Designation Here.." class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Company</label>
								<input type="text" placeholder="Enter Company Name Here.." class="form-control">
							</div>	
						</div>		 -->				
					<div class="form-group">
						<label><?php echo  $language['phone_number']; ?></label>
						<input type="text" placeholder="<?php echo  $language['enter_phone_no_here']; ?>" class="form-control">
					</div>		
					<div class="form-group">
						<label><?php echo  $language['email']; ?></label>
						<input type="text" placeholder="<?php echo  $language['enter_email_here']; ?>"class="form-control">
					</div>
					<div class="form-group">
						<label><?php echo  $language['password']; ?></label>
						<input type="password" placeholder="<?php echo  $language['enter_password_here']; ?>" class="form-control">
					</div>
					<button type="submit" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>

<?php
include '../content/footer.php';
?>
    </body>
</html>
