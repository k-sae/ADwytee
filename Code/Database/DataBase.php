<?php

 /**
 *
 this class to all DataBase function


 */

class DataBase
{
  private  $host;
  private $user;
  private $password;
  private $database;
  private $connection;
  function __construct($file_name)
  {

    # code...
    try {
    include_once $file_name ;
      } catch (Exception $e) {
      echo "error in file name";
    }
    $this->host=$SERVER;
    $this->user=$USERNAME;
    $this->password=$PASSWORD;
    $this->database=$DATABASE;
    $this->connection();
}
  private  function connection(){
    //connect to server
   $this ->con =mysqli_connect($this->host,$this->user,$this->password,$this->database)
   or die ( mysqli_error($MySQL_Handle) );
   }
   function close_connection(){
     //close connection
    mysqli_close($this->con);
   }
   function get_con(){
     return $this->con;
   }
   public function fetch_query($query)
   {
     // applay query and return assc aaray
     # code...
     return $this->database_all_assoc($this->database_query($query));
   }
   public function database_query($database_query) {
     //aplay query
     $sSQL= 'SET CHARACTER SET utf8';
      mysqli_query($this->con,$sSQL) ;
       $query_result = mysqli_query($this->con,$database_query);
       return $query_result;
   }
   public function database_all_assoc($database_result) {
      // return assc array
      
        while ($row = mysqli_fetch_assoc($database_result)) {
            $array_return[] = $row;
        }

        return $array_return;
  }

  }


 ?>
