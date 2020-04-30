
 <?php  
 
 include('include/db.php');  

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

  <!-- Inicio de Sesión  -->
<div class="">
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
			
			
		<!-- <div class="divider"></div> -->
		
			<div class="row" style="margin-top:15px; margin-bottom:-40px;">
			<center>¿Aún no tienes cuenta?</br>
      <a href="register" class="modal-close waves-effect waves-purple btn-flat"><b>Regístrate</b></a></center>
		</div>
		
		</div>
		<br><br>