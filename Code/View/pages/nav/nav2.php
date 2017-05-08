<?php include_once 'language.php'; ?>

<li ><a href="Pharmacy.php"><?php echo  $language['pharmacyprofile']?></a></li>
<li class="<?php if($page=="pharmacyorder"){echo "active";}?>"><a href="pharmacyOrder.php"><?php echo  $language['pharmacyorder']?></a></li>
<li><a href="logout.php"><?php echo  $language['logout']?></a></li>