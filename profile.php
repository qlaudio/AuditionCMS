<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta name="theme-color" content="#6a1b9a">
  <title>Audition</title>
 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <!-- Se incluye Menu y Nav  -->
	<?php
	error_reporting(0);
		include 'include/navmenu.php';
		
		if ($_SESSION["welcome"]==1){
					?>
					
					
					<script type="text/javascript">
					var toastHTML = '¡Sesión iniciada con éxito!';
					M.toast({html: toastHTML, classes: 'rounded'});
					</script>
					<?php
					$_SESSION["welcome"]=0;
				}
	?>
	
    <!--   Contenido   -->
  <div class="container">
    <div class="section">
	  <div class="row">
        
	<!-- Se incluye Menu de la Tienda  -->
		<?php
		include 'include/usermenu.php';
		?>
	
	
	
			<div class="col s12 m9 hide-on-med-and-down">
			
			<?php
			 if(isset($_SESSION["userid"]))  
			{  
		
			?>
            <h5 class="center">Detalles de Usuario</h5>
			
			
			
			<?php
			 
		
			$usuario=$_SESSION["userid"];
		
			$consulta="SELECT * FROM userinfo where UserID=:usuario";
			$queryc = $connect -> prepare($consulta);
			$queryc->bindParam(':usuario',$usuario);
			$queryc -> execute();
			
			$queryc->execute();
		//
			
			while ($fila = $queryc->fetch(PDO::FETCH_ASSOC)) {
				$usersn=$fila['UserSN'];
				$userid=$fila['UserID'];
				$usernick=$fila['UserNick'];
				//echo $fila['UserSN']." ".$fila['UserID'].PHP_EOL;
			}
			
			$usuario=$_SESSION["userid"];
		
			$consulta2="SELECT * FROM usercash where UserSN=:usersn";
			$querycash = $itemdb -> prepare($consulta2);
			$querycash->bindParam(':usersn',$usuario);
			$querycash -> execute();
			
			$querycash->execute();
		//
			
			while ($fila = $querycash->fetch(PDO::FETCH_ASSOC)) {
				$cashactual=$fila['Cash'];
				//echo $fila['UserSN']." ".$fila['UserID'].PHP_EOL;
			}
			
			$consulta3="SELECT * FROM userden where UserSN=:usersn";
			$queryden = $itemdb -> prepare($consulta3);
			$queryden->bindParam(':usersn',$usuario);
			$queryden -> execute();
			
			$queryden->execute();
		//
			
			while ($fila = $queryden->fetch(PDO::FETCH_ASSOC)) {
				$denactual=$fila['Den'];
				//echo $fila['UserSN']." ".$fila['UserID'].PHP_EOL;
			}
			
			
			?>
			
			
			 <div class="card horizontal purple lighten-3">
			       <div class="card-image">
        <img class="responsive-img" src="https://surfrider.eu/img/avatar/defaut.png" >
      </div>
			  <div class="card-stacked">
				<div class="card-content white-text">
				<h4 ><b><?php echo $usernick; ?></b></h4>
				<p style="font-size:12px; margin-top:-15px; margin-left:1px;">Usuario: <?php echo $userid; ?> </p><br>
				<p style="margin-left:1px;"><b>Cash: <?php echo $cashactual; ?> </b></p>
				<p style="margin-left:1px;"><b>Den: <?php echo $denactual; ?> </b></p>
			
			
        
      </div>
	  <div class="card-action">
          <a href="#"></a>
        </div>
			</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			<?php
				//header("location:index.php");  
			}  
			else  
			{  
		
					include 'include/login.php';

			} 
			?>
			
			
        </div>
		
		
		
		<!---------------- shagshagshgasa ----->
		
		
		
					<div style="margin-top:-25px" class="col s12 m12 hide-on-large-only">
			
			<?php
			 if(isset($_SESSION["userid"]))  
			{  
		
		
			?>
            <h5 class="center">Detalles de Usuario</h5>
			<br>
			
			
			<?php
			 
		
			$usuario=$_SESSION["userid"];
		
			$consulta="SELECT * FROM userinfo where UserID=:usuario";
			$queryc = $connect -> prepare($consulta);
			$queryc->bindParam(':usuario',$usuario);
			$queryc -> execute();
			
			$queryc->execute();
		//
			
			while ($fila = $queryc->fetch(PDO::FETCH_ASSOC)) {
				$usersn=$fila['UserSN'];
				$userid=$fila['UserID'];
				$usernick=$fila['UserNick'];
				//echo $fila['UserSN']." ".$fila['UserID'].PHP_EOL;
			}
			
			
			?>
			
			
			 <div class="card horizontal purple lighten-3">
				<div class="col s4 valign-wrapper" style="margin-left:10px;">
					<img class="responsive-img circle right-align" src="https://surfrider.eu/img/avatar/defaut.png" >
				</div>
			<div class="col s8 ">
			  <div class="card-stacked ">
				<div class="card-content white-text">
				<h4 ><b><?php echo $usernick; ?></b></h4>
				<p style="font-size:12px; margin-top:-15px; margin-left:1px;">Usuario: <?php echo $userid; ?> </p><br>
				<p style="margin-left:1px;"><b>Cash: <?php echo $cashactual; ?> </b></p>
				<p style="margin-left:1px;"><b>Den: <?php echo $denactual; ?> </b></p>
			
			
        
      </div>
	  <div class="card-action">
          <a href="#"></a>
        </div>
			</div>
			</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			<?php
				//header("location:index.php");  
			}  
			else  
			{  
		
					include 'include/login.php';

			} 
			?>
			
			
        </div>

        
      </div>
    </div>
  </div> 

    <!-- Se incluye Footer  -->
	<?php
		include 'include/footer.php';
	?>

 <script type="text/javascript">
	$(document).ready(function(){
    $('.collapsible').collapsible();
  });
  </script>

  </body>
</html>
