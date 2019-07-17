<?php

class Connect{
  
  private static $ConDB;


  public static function openConnection()
  {
  		try {
  			self::$ConDB = mysqli_connect("localhost","root","","sweetevents");
  			echo "exito";	
  		} catch (Exception $ex) {
  			echo "Error: " . $ex;
  			die();
  	}
}
public static function closeConnection(){
	if(isset(self::$ConDB)){
		self::$ConDB = null;
	}
}

public static function getConnection(){
  return self::$ConDB;
}

}
?>



  

	