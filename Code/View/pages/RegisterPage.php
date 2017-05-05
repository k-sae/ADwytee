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
<div class="reg-back" style = "min-height: 100vh">
	<div class="darklay" style = "min-height: 100vh">
<div class="container reg-container">
    <h1 class="well register-dialog">Registration Form</h1>
	<div class="col-lg-12 well register-dialog" >
	<div>
		<h3>Register As</h3>
		<button class="btn btn-lg btn-primary" id="regp">Patient</button>
		<button class="btn btn-lg btn-primary" id="regph">Pharamacy</button>
	</div>
	<div class="row regasp" >
				<form method="post"  id="preg-form">
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
								<input type="text" name="government" placeholder="<?php echo  $language['enter_governemnt_name_here']; ?>" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label><?php echo  $language['district']; ?></label>
								<input type="text" name="district" placeholder="<?php echo  $language['enter_district_name_here']; ?>" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label><?php echo  $language['street_no']; ?></label>
								<input type="text" name="street_no" placeholder="<?php echo  $language['enter_street_no_here']; ?>" class="form-control">
							</div>		
						</div>			
					<div class="form-group">
						<label><?php echo  $language['phone_number']; ?></label>
						<input type="text" name="phone_number" placeholder="<?php echo  $language['enter_phone_no_here']; ?>" class="form-control">
					</div>		
					<div class="form-group">
						<label><?php echo  $language['email']; ?></label>
						<input type="text" name="email" placeholder="<?php echo  $language['enter_email_here']; ?>"class="form-control">
					</div>
					<div class="form-group">
						<label><?php echo  $language['password']; ?></label>
						<input type="password" name="password" placeholder="<?php echo  $language['enter_password_here']; ?>" class="form-control">
					</div>
					<button type="submit" class="btn btn-lg btn-info" onclick="registerfunction()" name="regp">Submit</button>					
					</div>
				</form> 
				</div>
				<div class="row regasph ph-reg-dialog" >
				<form  method="post">
					<div class="form-group row">
						<label for="example-text-input" class="col-xs-3 col-form-label">Pharmacy Name:</label>
						<div class="col-xs-5">
							<input class="form-control" name="Name" type="text" placeholder="Pharmacy_Name" id="example-text-input" required="required">
						</div>
					</div>
					<div class="form-group row">
						<label for="example-text-input" class="col-xs-3 col-form-label">Location :</label>
						<div class="col-xs-5">
							<label>add map here</label>
						</div>

					</div>
					<div class="form-group row">
						<label for="example-text-input" class="col-xs-3 col-form-label">notes :</label>
						<div class="col-xs-8">
							<input class="form-control" name="notes" type="text" placeholder="notes" id="example-text-input" required="required">
						</div>
					</div>
					<div class="form-group row">
						<label for="example-text-input" class="col-xs-3 col-form-label">email :</label>
						<div class="col-xs-8">
							<input class="form-control" name="notes" type="email" placeholder="E_mail" id="example-text-input" required="required">
						</div>
					</div>
					<div class="form-group row">
						<label for="example-text-input" class="col-xs-3 col-form-label">pass :</label>
						<div class="col-xs-8">
							<input class="form-control" name="notes" type="password" placeholder="password" id="example-text-input" required="required">
						</div>
					</div>

					<div class="form-group row">
						<label for="example-text-input" class="col-xs-3 col-form-label">describition :</label>
						<div class="col-xs-8">
							<textarea class="form-control" rows="5" name="describition" id="comment" required="required"></textarea>
						</div>
					</div>	
					<div>	
					<button type="submit" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>
	</div>
</div>
<?php
include '../content/footer.php';
?>

