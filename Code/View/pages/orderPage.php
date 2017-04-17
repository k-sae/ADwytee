<?php
session_start();
if (!isset($_SESSION["language"])){
  $_SESSION["language"] ='en';
}
else {

$_SESSION["language"] ='ar';
}
//include_once '../../Application/order.php';

$dictionary_path = './dictionary/'.$_SESSION["language"].'.php';

include_once  $dictionary_path;
//$order =new order();

 ?>
<!docotype html>
<html>
    <head>
        <title><?php echo $language['orderpage'] ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/order.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/default.css">
    </head>
    <body>
      <?php
include '../content/header.php';
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
            <li ><a href="Pharmacy.php">Pharmacy Profile</a></li>
            <li class="active"><a href="#"><?php echo  $language['orderpage'] ?></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <table>
   <thead>
     <tr>
       <th colspan="3"><?php echo  $language['orders']; ?></th>
     </tr>
     <tr>
       <th>#</th>
       <th colspan="2">Atividade</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <td>1</td>
       <td>Atualizar página da equipe</td>
       <td>
         <i class="material-icons button edit">edit</i>
         <i class="material-icons button delete">delete</i>
       </td>
     </tr>
     <tr>
       <td>2</td>
       <td>Design da nova marca</td>
       <td>
         <i class="material-icons button edit">edit</i>
         <i class="material-icons button delete">delete</i>
       </td>
     </tr>
     <tr>
       <td>3</td>
       <td>Encontrar desenvolvedor front-end</td>
       <td>
         <i class="material-icons button edit">edit</i>
         <i class="material-icons button delete">delete</i>
       </td>
     </tr>
   </tbody>
 </table>
 <?php

include '../content/footer.php';
?>
    </body>
</html>
