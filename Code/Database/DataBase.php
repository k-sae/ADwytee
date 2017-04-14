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
  private $file_name= 'credential.php';
  function __construct()
  {

    # code...
    try {
    include_once $this->file_name ;
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

  if(! ($this ->con =mysqli_connect($this->host,$this->user,$this->password,$this->database)))
  {

    throw new Exception("Error: not connected to server");
    }
    if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }


  }
   function close_connection(){
    mysqli_close($this->con);
   }
   function get_con(){
     return $this->con;
   }
   public function fetch_query($query)
   {
     # code...
     return $this->database_all_assoc($this->database_query($query));
   }
   public function database_query($database_query) {

       $query_result = mysqli_query($this->con,$database_query);
       return $query_result;
   }
   public function database_all_assoc($database_result) {

        while ($row = mysqli_fetch_assoc($database_result)) {
            $array_return[] = $row;
        }

        return $array_return;
    }

  }


 ?>
