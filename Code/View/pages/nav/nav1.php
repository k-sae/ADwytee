<?php include_once 'language.php'; ?>

<li class="<?php if($page=="stat"){echo "active";}?>"><a href="statistics.php"><?php echo  $language['stat']?></a></li>
<li class="<?php if($page=="reservations"){echo "active";}?>"><a href="reservations.php"><?php echo ($language['reservations']); ?></a></li>
<li class="<?php if($page=="orderPage"){echo "active";}?>"><a href="orderPage.php"><?php echo  $language['orderpage']?></a></li>
<li><a href="logout.php"><?php echo  $language['logout']?></a></li>