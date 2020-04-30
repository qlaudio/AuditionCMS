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
	
        <div class="col s12 m9 hide-on-med-and-down">
            <h5 class="center">Priendas Inferiores</h5>
			<div class="divider"></div>
            <p class="light">
			
			
			<!-- Se incluye la Tienda  -->
				<?php
				$tipo='p';
				include 'include/store.php';
				?>
			
			</p>
        </div>
		
		<div style="margin-top:-25px" class="col s12 m12 hide-on-large-only">
			<h5 class="center">Peinados y Sombreros</h5>
			<div class="divider"></div>
            <p class="light">
			
			
			<!-- Se incluye la Tienda  -->
				<?php
				$tipo='p';
				include 'include/store.php';
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
