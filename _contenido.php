<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
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
	
      <div class="row hide-on-large-only">
	  <a href="#" data-target="navtienda" style="float:left; margin-bottom:-15px;" class="sidenav-trigger btn-floating btn-large waves-effect waves-light amber"><i class="material-icons">shopping_cart</i></a>
	  </div>
	  
	  <div class="row">
        <div class="col s2 m3 hide-on-med-and-down">
		<h5 class="center">Navegación</h5>
			<!-- <div class="divider"></div> -->
			
			<div class="collection " >
				<a href="#!" class="collection-item"><span class="new badge">12</span>Ofertas</a>
				<a href="#!" class="collection-item"><span class="new badge">4</span>Conjuntos y Packs</a>
				<a href="#!" class="collection-item">Accesorios</a>
				<a href="#!" class="collection-item">Alas</a>
				<a href="#!" class="collection-item">DJs</a>
				<a href="#!" class="collection-item">Guitarras</a>
				<a href="#!" class="collection-item">Items</a>
				<a href="#!" class="collection-item">Mascotas</a>
				<a href="#!" class="collection-item">Peinados</a>
				<a href="#!" class="collection-item">Rostros</a>
				<a href="#!" class="collection-item">Prendas Superiores</a>
				<a href="#!" class="collection-item">Prendas Inferiores</a>
				<a href="#!" class="collection-item">Calzado</a>
				<a href="#!" class="collection-item">Emociones</a>
				<a href="#!" class="collection-item">Especiales</a>
				<a href="#!" class="collection-item">Tickets</a>
			</div>
	
        </div>
		
		<ul id="navtienda" class="sidenav">
		<li><div class="user-view">
      <div class="background">
        <img src="img/bg1.jpg">
      </div>
      <a href="#user"><img class="circle" src="img/usericon.png"></a>
      <a href="#name"><span class="white-text name">Bienvenido</span></a>
      <a href="#email"><span class="white-text email">Inicia sesión para continuar.</span></a>
    </div></li>
		
	  <li><a href="carrito.php"><i class="material-icons right">shopping_cart</i> Carrito</a></li>
	  <div class="divider"></div>
     <li><a href="index.php"><i class="material-icons right"></i> Conjuntos y Packs</a></li>
		<li><a href="#"><i class="material-icons right"></i> Accesorios</a></li>
		<li><a href="#"><i class="material-icons right"></i> Alas</a></li>
		<li><a href="#"><i class="material-icons right"></i> DJs</a></li>
		<li><a href="#"><i class="material-icons right"></i> Guitarras</a></li>
		<li><a href="#"><i class="material-icons right"></i> Items</a></li>
		<li><a href="#"><i class="material-icons right"></i> Mascotas</a></li>
		<li><a href="#"><i class="material-icons right"></i> Peinados</a></li>
		<li><a href="#"><i class="material-icons right"></i> Rostros</a></li>
		<li><a href="#"><i class="material-icons right"></i> Prendas Superiores</a></li>
		<li><a href="#"><i class="material-icons right"></i> Prendas Inferiores</a></li>
		<li><a href="#"><i class="material-icons right"></i> Calzado</a></li>
		<li><a href="#"><i class="material-icons right"></i> Emociones</a></li>
		<li><a href="#"><i class="material-icons right"></i> Especiales</a></li>
		<li><a href="#"><i class="material-icons right"></i> Tickets</a></li>
      </ul>
		









        <div class="col s12 m9">
            <h5 class="center">Test de Título</h5>
			<div class="divider"></div>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
         
        </div>

        
      </div>

    </div>
    <br><br>
  </div> 




  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
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
