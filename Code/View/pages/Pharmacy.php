<?php
session_start();
if (!isset($_SESSION["language"])){
  $_SESSION["language"] ='en';
}
else {

$_SESSION["language"] ='ar';
}
include '../content/header.php';
$dictionary_path = './dictionary/'.$_SESSION["language"].'.php';
include_once  $dictionary_path;

?>
	<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">ADwytee</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Pharmacy Profile</a></li>
						<li ><a href="orderPage.php"><?php echo  $language['orderpage']?></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper container">
	    <div class="details col-sm-9">
			<div class="img col-sm-2"></div>
			<div class="info col-sm-10">
				<h3>name : </h3>
				<h3>notes : </h3>
				<h3>decribition : </h3>
				<h3>Location : </h3>
			</div>
			 <button class=" btn btn-lg btn-primary"> edit</button>
	    </div>
	     <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div>
    </div>
	<div class="container">
		  <h2>Table</h2>
		  <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>
		  <div class="table-responsive">
		  <table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Firstname</th>
		        <th>Lastname</th>
		        <th>Age</th>
		        <th>City</th>
		        <th>Country</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>1</td>
		        <td>Anna</td>
		        <td>Pitt</td>
		        <td>35</td>
		        <td>New York</td>
		        <td>USA</td>
		      </tr>
		    </tbody>
		  </table>
		  </div>
		</div>


<?php
include '../content/footer.php';
?>
