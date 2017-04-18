<?php
include '../content/header.php';
?>
  <table class="Ordertable">
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
