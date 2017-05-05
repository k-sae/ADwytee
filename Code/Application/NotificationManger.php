<?php
/**
 *
 */
class NotificationManger
{
private $file_name = '../../Database/Notification.php';
private $file_name2 = '../../Application/Notification.php';

private $notification_query;
private $notification;
  function __construct()
  {
    try {
   include_once ($this->file_name) ;
   include_once ($this->file_name2) ;

     } catch (Exception $e) {
     echo "error in file name";

  }
  $this->notification_query=  new Notification_Query();

}
public function check_Notification($id)
{
return ($this->notification_query->check_Notification($id));
}
}
?>
