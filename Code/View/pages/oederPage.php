<?php
include_once '../../Application/order.php';
$order =new order();
 ?>
<!docotype html>
<html>
    <head>
        <title>home</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/home.css">
    </head>
    <body>
         <div class="d1"><h1><?php
         echo "عبيط";
         header('Content-Type: charset=utf-8');
           var_dump($order->print_word(4)); ?></h1> </div>
        <div class="d2"><h1>personal نننن </h1> </div>
        <div class="d3"><h1>skills in web design</h1></div>
        <div class="d4"><h1>skills in programming</h1> </div>

         <script src="../jq/jquery-1.12.3.min.js"></script>
    <script src="../jq/home.js"></script>
    </body>
</html>
