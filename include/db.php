 <?php  
 $host = "127.0.0.1";  
 $username = "AuditionCMS";  
 $passdb = "18141533";  
 $database = "audition";  
 $item = "itemdb"; 
 $login = "auditionlogin"; 
 $NewUserCash = "9500000";
 $NewUserDen = "5500000";
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $passdb);  
	   $itemdb = new PDO("mysql:host=$host; dbname=$item", $username, $passdb); 
		$auditionlogin = new PDO("mysql:host=$host; dbname=$login", $username, $passdb); 	   
      //$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 
 
 
 
 ?> 