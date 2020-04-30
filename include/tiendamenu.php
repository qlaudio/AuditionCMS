
	
	<div class="row hide-on-large-only">
	<div class="fixed-action-btn" style="top:-5px; max-height:80px;" >
	  <a href="#" data-target="navtienda"  class="sidenav-trigger btn-floating waves-effect waves-light amber"><i class="material-icons">shopping_cart</i></a>
	</div>
	</div>
        <div class="col s2 m3 hide-on-med-and-down">
		<h5 class="center">Cartera</h5>
			<!-- <div class="divider"></div> -->
			<?php
			if(isset($_SESSION["userid"]))  
		{
			$usuario=$_SESSION["usersn"];
		
					$consulta1="SELECT * FROM userden where UserSN=:usuario";
					$queryden = $itemdb -> prepare($consulta1);
					$queryden->bindParam(':usuario',$usuario);
					$queryden -> execute();
					while ($fila = $queryden->fetch(PDO::FETCH_ASSOC)) {
						
						$den = $fila['Den'];
						
						
					}
					
					$consulta2="SELECT * FROM usercash where UserSN=:usuario";
					$querycash = $itemdb -> prepare($consulta2);
					$querycash->bindParam(':usuario',$usuario);
					$querycash -> execute();
					while ($fila = $querycash->fetch(PDO::FETCH_ASSOC)) {
						
					
						$cash = $fila['Cash'];
						
					}
			
			
			?>
			<div class="collection " >
				<a href="profile" class="collection-item"><b><?php echo $_SESSION["userid"];?> </b></a>
				<a href="" class="collection-item"><?php echo '<b><span class="light-green-text detalles">Den: '.$den.'</span></b>'; ?> <br> <?php echo '<b><span class="amber-text detalles">Cash: '.$cash.'</span></b>'; ?></a>
			</div>
		<?php
		}
		?>
		<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
?>
			
			<h5 class="center">Navegación</h5>
			<div class="collection " >
				<a href="carrito" class="collection-item <?php active('carrito');?>"><i class="material-icons right">shopping_cart</i><b>CARRITO </b></a>
				<a href="tienda" class="collection-item <?php active('tienda');?>"><span class="new badge">12</span>Ofertas</a>
				<!---<a href="#!" class="collection-item"><span class="new badge">4</span>Conjuntos y Packs</a>--->
				<a href="accs" class="collection-item <?php active('accs');?>">Accesorios</a>
				<a href="wings" class="collection-item <?php active('wings');?>">Alas</a>
				<a href="djs" class="collection-item <?php active('djs');?>">DJs</a>
				<a href="guitars" class="collection-item <?php active('guitars');?>">Guitarras</a>
				<!---<a href="#!" class="collection-item">Items</a>
				<a href="#!" class="collection-item">Mascotas</a>--->
				<a href="hairs" class="collection-item <?php active('hairs');?>">Peinados</a>
				<a href="faces" class="collection-item <?php active('faces');?>">Rostros</a>
				<a href="jackets" class="collection-item <?php active('jackets');?>">Prendas Superiores</a>
				<a href="pants" class="collection-item <?php active('pants');?>">Prendas Inferiores</a>
				<a href="shoes" class="collection-item <?php active('shoes');?>">Calzado</a>
				<!---<a href="#!" class="collection-item">Emociones</a>
				<a href="#!" class="collection-item">Especiales</a>
				<a href="#!" class="collection-item">Tickets</a>--->
			</div>
	
        </div>
		
		<ul id="navtienda" class="sidenav">
				<li><div class="user-view bgsidenav">

      <a href="profile"><img class="circle" src="img/usericon.png"></a>
      
	  <?php
			if(isset($_SESSION["userid"]))  
		{
			echo '<b><span class="white-text name">Bienvenido, '.$_SESSION["userid"].'</span></b>'; 
			
					$usuario=$_SESSION["usersn"];
		
					$consulta1="SELECT * FROM userden where UserSN=:usuario";
					$queryden = $itemdb -> prepare($consulta1);
					$queryden->bindParam(':usuario',$usuario);
					$queryden -> execute();
					while ($fila = $queryden->fetch(PDO::FETCH_ASSOC)) {
						
						$den = $fila['Den'];
						
						
					}
					
					$consulta2="SELECT * FROM usercash where UserSN=:usuario";
					$querycash = $itemdb -> prepare($consulta2);
					$querycash->bindParam(':usuario',$usuario);
					$querycash -> execute();
					while ($fila = $querycash->fetch(PDO::FETCH_ASSOC)) {
						
					
						$cash = $fila['Cash'];
						
					}
					echo '<b><span class="light-green-text detalles">Den: '.$den.'</span></b>'; 
					echo '<b><span style="margin-top:-5px;" class="yellow-text detalles">Cash: '.$cash.'</span></b>'; 
					
		}
		else
			echo '<span class="white-text name">Bienvenido Usuario </span>';
		?>
		
		
	  
	  
		<?php
			if(isset($_SESSION["userid"]))  
		{
		?>
			<a href="logout" class="waves-effect waves-purple btn-flat white-text"><small>Salir</small></a>
		<?php
			}  
			else  
			{  
		?>
      <a href="#modal1" class="modal-trigger"><span class="white-text email">Inicia sesión para continuar.</span></a>
	  
	  <?php
		 }  

		?>
    </div></li>
		
	  <li><a href="carrito"><i class="material-icons right">shopping_cart</i> 
	 <!--- <span class="badge">12</span> --->
	  Carrito</a></li>
	  <div class="divider"></div>
		<!---<li><a href="index"><i class="material-icons right"></i> Conjuntos y Packs</a></li>--->
		<li class="<?php active('tienda');?>"><a href="tienda" ><i class="material-icons right"></i> Ofertas</a></li>
		<li class="<?php active('accs');?>"><a href="accs" ><i class="material-icons right"></i> Accesorios</a></li>
		<li class="<?php active('wings');?>"><a href="wings"><i class="material-icons right"></i> Alas</a></li>
		<li class="<?php active('djs');?>"><a href="djs"><i class="material-icons right"></i> DJs</a></li>
		<li class="<?php active('guitars');?>"><a href="guitars"><i class="material-icons right"></i> Guitarras</a></li>
		<!---<li><a href="#"><i class="material-icons right"></i> Items</a></li>
		<li><a href="#"><i class="material-icons right"></i> Mascotas</a></li>--->
		<li class="<?php active('hairs');?>"><a href="hairs"><i class="material-icons right"></i> Peinados</a></li>
		<li class="<?php active('faces');?>"><a href="faces"><i class="material-icons right"></i> Rostros</a></li>
		<li class="<?php active('jackets');?>"><a href="jackets"><i class="material-icons right"></i> Prendas Superiores</a></li>
		<li class="<?php active('pants');?>"><a href="pants"><i class="material-icons right"></i> Prendas Inferiores</a></li>
		<li class="<?php active('shoes');?>"><a href="shoes"><i class="material-icons right"></i> Calzado</a></li>
		<!---<li><a href="#"><i class="material-icons right"></i> Emociones</a></li>
		<li><a href="#"><i class="material-icons right"></i> Especiales</a></li>
		<li><a href="#"><i class="material-icons right"></i> Tickets</a></li>--->
      </ul>
		





