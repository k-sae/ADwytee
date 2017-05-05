<?php

 /**
 *
 this class to all DataBase function


 */

class DataBase
{
  private  $host; //  host name
  private $user;
  private $password;
  private $database;
  private $connection;
  private static $instance;// single database object
  private function __construct($file_name)
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
   or die ( "filed connection" );
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

     $return_query =$this->database_query($query);
     if(isset($return_query)  && $return_query !=False){
     return $this->database_all_assoc($return_query);
   }
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
        if(isset( $array_return)){
        return $array_return;
      }
  }



  public static function getInstance($filename){// create only one object for databse
          if(!self::$instance){
              self::$instance= new  self($filename);
          }
          return self::$instance;
      }
    }
 ?>
