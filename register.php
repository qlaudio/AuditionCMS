<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta name="theme-color" content="#6a1b9a">
  <title>Audition - Registro</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<?php
	include('include/db.php');
	$error=0;
	$usersn=0;
	if(isset($_POST['signup'])){
		$username = $_POST['username'];
		$usergame = $_POST['usergame'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$gender = $_POST['gender'];
		$popcard = $_POST['popcard'];
		$sex=0;
		//$lname = $_POST['lname'];
		//$city = $_POST['city'];
		
		
		// Query for validation of username and email-id
$ret="SELECT * FROM userinfo where UserID=:username";
$queryt = $connect -> prepare($ret);
$queryt->bindParam(':username',$username,PDO::PARAM_STR);
$queryt -> execute();
if($queryt -> rowCount() == 0)
{
	if ($password==$password2)
	{
		
	$ret="SELECT * FROM users where UserEMail=:email";
	$emailquery = $connect -> prepare($ret);
	$emailquery->bindParam(':email',$email,PDO::PARAM_STR);
	$emailquery -> execute();
	
		if($emailquery -> rowCount() == 0)
		{
	$ret3="SELECT * FROM userinfo where UserNick=:usergame";
	$queryt3 = $connect -> prepare($ret3);
	$queryt3->bindParam(':usergame',$usergame);
	$queryt3 -> execute();
	if($queryt3 -> rowCount() == 0)
	{
		
		$insert = $connect->prepare("INSERT INTO userinfo(Usernick,UserID,password,UserGender)
				values(:usergame, :username, :password, :gender)
				");
		$insert->bindParam (':usergame',$usergame);
		$insert->bindParam (':username',$username);
		$insert->bindParam (':password',$password);
		$insert->bindParam (':gender',$gender);
		$insert->execute();
		
		
		$ret="SELECT UserSN FROM userinfo where UserID=:username";
		$queryt2 = $connect -> prepare($ret);
		$queryt2->bindParam(':username',$username,PDO::PARAM_STR);
		$queryt2 -> execute();
		foreach ($queryt2 as $row)
			{
			$usersn= $row['UserSN'];
			}
		
		
		$insert2 = $connect->prepare("INSERT INTO users(usersn,Usernick,UserID,username,useremail,UserGender)
				values(:usersn, :usergame, :username, :usergame, :email, :gender)
				");
		$insert2->bindParam (':usersn',$usersn);
		$insert2->bindParam (':usergame',$usergame);
		$insert2->bindParam (':username',$username);
		$insert2->bindParam (':usergame',$usergame);
		$insert2->bindParam (':email',$email);
		$insert2->bindParam (':gender',$gender);
		$insert2->execute();
		
		if ($gender=="F"){
			$sex=1;
		}
		
		$insert3 = $auditionlogin->prepare("INSERT INTO member(id,userid,usernick,username,passwd,sex,popcard,Id9you)
				values(:usersn, :username, :usergame, :usergame, :password, :sex, :popcard, :usersn)
				");
		$insert3->bindParam (':usersn',$usersn);
		$insert3->bindParam (':username',$username);
		$insert3->bindParam (':usergame',$usergame);
		$insert3->bindParam (':usergame',$usergame);
		$insert3->bindParam (':password',$password);
		$insert3->bindParam (':sex',$sex);
		$insert3->bindParam (':popcard',$popcard);
		$insert3->bindParam (':usersn',$usersn);
		$insert3->execute();
		
		$insert4 = $itemdb->prepare("INSERT INTO usercash(usersn,cash)
				values(:usersn, :NewUserCash)
				");
		$insert4->bindParam (':usersn',$usersn);
		$insert4->bindParam (':NewUserCash',$NewUserCash);
		$insert4->execute();
		
		$insert4 = $itemdb->prepare("INSERT INTO userden(usersn,den)
				values(:usersn, :NewUserDen)
				");
		$insert4->bindParam (':usersn',$usersn);
		$insert4->bindParam (':NewUserDen',$NewUserDen);
		$insert4->execute();
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		header("location:profile.php"); 
	}
	else{
	$error=2;
	}
	
	}
	else{
		$error=4;
	}
	}
	else{
	$error=3;
	}
	

	}
	else{
	$error=1;
	}
}

?>


	<!-- Se incluye Menu y Nav  -->
	<?php
		include 'include/navmenu.php';
	?>
  
   
    <!--   Contenido   -->
  <div class="container">
    <div class="section">
      <div class="row">
	  
        <div class="col s12 m3">
		<h5 class="center">Bienvenido a Audition</h5>
			<div class="divider"></div> 
			
			<br>Test bla bla bla...<br>
			<div class="collection">
				<a href="#!" class="collection-item"><span class="new badge">12</span>Ofertas</a>
				<a href="#!" class="collection-item"><span class="new badge">4</span>Conjuntos y Packs</a>
				<a href="#!" class="collection-item">Accesorios</a>
				<a href="#!" class="collection-item">Alas</a>
				<a href="#!" class="collection-item">DJs</a>
				<a href="#!" class="collection-item">Guitarras</a>
				
			</div>
	
        </div>
		
		<div class="col s12 m9">
            <h5 class="center">Regístrate</h5>
			<div class="divider"></div>
			<?php
			if ($error==1){
			?>
			 <div class="card-panel white-text red lighten-2"><center>El nombre de usuario ya existe</center></div>
			<?php
			}
			?>
			
			<?php
			if ($error==2){
			?>
			 <div class="card-panel white-text red lighten-2"><center>El nombre en el juego ya está en uso.</center></div>
			<?php
			}
			?>
			
			<?php
			if ($error==3){
			?>
			 <div class="card-panel white-text red lighten-2"><center>Las contraseñas no coinciden.</center></div>
			<?php
			}
			
			?>
			
			<?php
			if ($error==4){
			?>
			 <div class="card-panel white-text red lighten-2"><center>El Email ya está en uso.</center></div>
			<?php
			}
			
			?>

            <p class="light">
			
			<div class="col hide-on-small-only m2"></div>
			<div class="col s12 m8">
		<form method="post">
		
		<table style="border:0px">
        <tbody>
          
          <tr>
            <td>Nombre de Usuario</td>
            <td><small>Sólo letras minúsculas y números. 6 a 15 Caracteres.</small>
			<input class="input-field" type="text" name = "username" pattern="^[a-z][a-z0-9-_.]{4,15}$" placeholder = "Nombre de Usuario" title="Sólo letras minúsculas y números son permitidos en el nombre. De 5 a 15 Caracteres" required> 
			
			</td>
          </tr>
          <tr>
            <td>Nombre en el Juego</td>
            <td><input class="input-field" type="text" name = "usergame" pattern="^[-a-zA-Z0-9@\.+_]+$" placeholder = "Nombre en el Juego" required> </td>
          </tr>
		  <tr>
		  <td>Email</td>
            <td><input class="input-field" type="email" name = "email" placeholder = "Email" required> </td>
          </tr>
		  <tr>
		  <td>Contraseña</td>
            <td><input class="input-field" type="password" name = "password" placeholder = "Contraseña" required></td>
          </tr>
		  <tr>
		  <td>Repite Contraseña</td>
            <td><input class="input-field" type="password" name = "password2" placeholder = "Repite Contraseña" required></td>
          </tr>
		  <tr>
		  <td>Código Popcard</td>
            <td><input class="input-field" type="text" name = "popcard" placeholder = "Popcard" required> </td>
          </tr>
		  <tr>
		  <td>Genero</td>
            <td><p>
			<label>
				<input name="gender" value="M" type="radio" checked />
			<span>Hombre</span>
			</label>
			</p>
			<p>
			<label>
				<input name="gender" value="F" type="radio" />
				<span>Mujer</span>
			</label>
			</p></td>
          </tr>
		   <tr>
		  <td></td>
            <td><input type="submit" class="btn waves-effect waves-light amber" name = "signup" Value = "Regístrate"></td>
          </tr>
		  
		  
        </tbody>
      </table>
		
		
		
		

			

		</form>
		</div>
		<div class="col hide-on-small-only m2"></div>

			</p>
      </div>
	  
	  

        

        
      </div>

    </div>
    <br><br>
  </div> 

    <!-- Se incluye Footer  -->
	<?php
		include 'include/footer.php';
	?>

  </body>
</html>
