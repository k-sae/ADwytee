<?php
include '../content/header.php';
?>
    <div class="wrapper container" style="height: 300px;margin-top:50px">
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
