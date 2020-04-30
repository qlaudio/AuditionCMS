<?php  
 //login_success  
 session_start();  
 if(isset($_SESSION["userid"]))  
 {  
      echo '<h3>Iniciando sesión como '.$_SESSION["userid"].'</h3>';  
      echo '<br /><br /><a href="logout">Salir</a>';  
	  header("location:profile"); 
		$_SESSION["welcome"]=1;
 }  
 else  
 {  
      header("location:index");  
 }  
 ?>  