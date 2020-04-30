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
		include 'include/navmenu.php';
	?>
	
    <!--   Contenido   -->
  <div class="container">
    <div class="section">
	  <div class="row">
        
	<!-- Se incluye Menu de la Tienda  -->
		<?php
		include 'include/tiendamenu.php';
	?>
	
	
	<div  class="col s0 m2 hide-on-large-only">
	</div>
        <div class="col s12 m9 center-align">
			<?php
			if(isset($_SESSION["userid"]))  
				{
					?>
            <h5 class="center">Carrito</h5>
			<div class="divider"></div>
            <p class="light">
			
			
			<!-- Se incluye Contenido  -->
				<?php
				
				

				$tipo='h';
				include 'include/cart.php';
				}
				else{
					include 'include/login.php';
				}
				?>
			
			</p>
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
