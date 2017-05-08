<?php include_once 'language.php'; ?>

<!--notification-->
<div class="dropdown">
  <li class="<?php if($_SESSION["notification"] == True) echo ' n-active';?>"
      id="dLabel" role="button" data-toggle="dropdown" data-target="#shownotification">
    <i class="fa fa-globe fa-2x " aria-hidden="true" onclick="hidenotification()" id="notification" ></i></li>
  <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel" data-target="#show">
    <div class="notification-heading"><h4 class="menu-title"><?php echo  $language['notification']?></h4>
    </div>
    <li class="divider"></li>
    <div class="notifications-wrapper">
      <a class="content" href="#">
        <div class="notification-item">
          <?php  $notification_value  =$notification->get_Notification(1);
          if($notification_value  == False){

            echo '<h4 class="item-title">'.$language['nonnotification'].'</h4>';
          }
          ?></div>
      </a>
    </div>
  </ul>

</div>

<li class="<?php if($page=="stat"){echo "active";}?>"><a href="statistics.php"><?php echo  $language['stat']?></a></li>
<li class="<?php if($page=="reservations"){echo "active";}?>"><a href="reservations.php"><?php echo ($language['reservations']); ?></a></li>
<li class="<?php if($page=="orderPage"){echo "active";}?>"><a href="orderPage.php"><?php echo  $language['orderpage']?></a></li>
<li><a href="logout.php"><?php echo  $language['logout']?></a></li>