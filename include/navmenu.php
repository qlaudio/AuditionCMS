
 <?php  
 
 include('include/db.php');
 session_start();  

      if(isset($_POST["login"]))  
      {  
		$userid = strtolower($_POST['userid']);
		
           if(empty($_POST["userid"]) || empty($_POST["password"]))  
           {  
                $message = '<label>¡Todos los Campos son Requeridos!</label>';  
           }  
           else  
           {  
				/*$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				
				$query2 = "SELECT * FROM userinfo WHERE UserId = :userid AND Password = :hashed_password";  
                $statement2 = $connect->prepare($query);  
                $statement2->execute(  
                     array(  
                          'userid'     =>     $_POST["userid"],  
                          'hashed_password'     =>     $_POST["hashed_password"]  
                     )  
                );    
				
				----- Contraseña encriptada sin uso para saltar seguridad del navegador ------
				*/ 
				
				
                $query = "SELECT * FROM userinfo WHERE UserId = :userid AND Password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'userid'     =>     $_POST["userid"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
			
					
                     $_SESSION["userid"] = $_POST["userid"];  
					 
					 $usuario=$_SESSION["userid"];
		
					$consulta="SELECT * FROM userinfo where UserID=:usuario";
					$queryg = $connect -> prepare($consulta);
					$queryg->bindParam(':usuario',$usuario);
					$queryg -> execute();
					while ($fila = $queryg->fetch(PDO::FETCH_ASSOC)) {
						
						$_SESSION["gender"] = $fila['UserGender'];
						$_SESSION["usersn"] = $fila['UserSN'];
						$_SESSION["usernick"] = $fila['UserNick'];
						
					//echo $_SESSION["gender"];
					}
					 
					 
					
					
                     header("location:login_success");  
                }  
                else  
                {  
                     $message = '¡Usuario o contraseña incorrectos!';  
                }  
           }  
      }  
  

 ?>  

  <nav class="purple darken-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index" class="brand-logo"><b>AuditionCMS</b></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index"> Home</a></li>
		<li><a href="descarga"> Download</a></li>
		<li><a href="tienda"> Shop</a></li>
		<?php
			if(isset($_SESSION["userid"]))  
		{
		?>
			<li><a href="profile"> Profile</a></li>
			<li><a href="logout"> Log Out</a></li>
		<?php
			}  
			else  
			{  
		?>
		<li><a href="#modal1"class="waves-effect waves-light btn amber modal-trigger">Login<i class="material-icons right">person</i></a></li>
		
		<?php
		 }  

		?>
		
      </ul>

      <ul id="nav-mobile" class="sidenav">
		<li><div class="user-view bgsidenav">
     
      <a href="profile"><img class="circle" src="img/usericon.png"></a>
      
	  <?php
			if(isset($_SESSION["userid"]))  
		{
			echo '<b><span class="white-text name">Bienvenido, '.$_SESSION["userid"].'</span></b>'; 
		}
		else
			echo '<span class="white-text name">Bienvenido Usuario </span>';
		?>
		
		
	  
	  
		<?php
			if(isset($_SESSION["userid"]))  
		{
		?>
			<a href="logout" class="waves-effect waves-purple btn-flat white-text"><small>Log Out</small></a>
		<?php
			}  
			else  
			{  
		?>
      <a href="#modal1" class="modal-trigger"><span class="white-text email">Log In to continue.</span></a>
	  
	  <?php
		 }  

		?>
    </div></li>
	
		<?php
			if(isset($_SESSION["userid"]))  
		{
		}
		else
		{
		?>
		<li><a href="#modal1" class="modal-trigger"><i class="material-icons right">person</i> Login</a></li>
		<div class="divider"></div>
		<?php
		 }  

		?>
	  
        <li><a href="index"><i class="material-icons right">home</i> Home</a></li>
		<?php
			if(isset($_SESSION["userid"]))  
		{
		?>
		
			<li><a href="profile"><i class="material-icons right">person</i>Profile</a></li>
		<?php
			}  
			
		?>
		<li><a href="descarga"><i class="material-icons right">cloud_download</i> Download</a></li>
		<li><a href="tienda"><i class="material-icons right">shopping_cart</i> Shop</a></li>
		
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  

  <!-- Inicio de Sesión Modal -->
  <div id="modal1" class="modal" style="max-width:400px;">
    <div class="modal-content">
      <h5><center>Inicia Sesión</center></h5>
	   <!-- <div class="divider"></div> -->
	   <br>
	   <?php  
                if(isset($message))  
                {  
                     echo '<div class="white-text red lighten-2" style=" margin-top:-16px;margin-bottom:10px; border-radius:4px; color:#ffffff; padding:-4px;"><center>'.$message.'</center></div>';  
                }  
                ?>  
		<div class="row">
			<div class="col s1 m2"><p></p></div>
			<div class="col s10 m8">
			
			<form method="post">  
                     <label>Nombre de Usuario</label>  
                     <input type="text" name="userid" class="form-control" required >  
                     <br />  
                     <label>Contraseña</label>  
                     <input type="password" name="password" class="form-control" required >  
                       
					  
                     <center><input  type="submit" name="login" style="margin-top:10px;" class="btn waves-effect waves-light amber"  value="Ingresar" /> </center>
                </form>  
				
			</div>
			<div class="col s1 m2"><p></p></div>
			</div>
			
			
			<div class="divider"></div>
			<div class="row" style="margin-top:15px; margin-bottom:-40px;">
			<center>¿Aún no tienes cuenta?</br>
      <a href="register" class="modal-close waves-effect waves-purple btn-flat"><b>Regístrate</b></a></center>
		</div>
		
		</div>
    <div class="modal-footer">
	  <a href="#!" class="modal-close waves-effect waves-purple btn-flat">Cerrar</a>
    </div>
  </div>
<!-- Fin Inicio de Sesión Modal -->  

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
	
    $(document).ready(function(){
    $('.modal').modal();
  });
  </script>
