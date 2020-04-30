
	
	<div class="row hide-on-large-only">
	<div class="fixed-action-btn" style="top:-5px; max-height:80px;" >
	  <a href="#" data-target="navuser" class="sidenav-trigger btn-floating waves-effect waves-light amber"><i class="material-icons">person</i></a>
	   </div>
	   
	</div>
        <div class="col s2 m3 hide-on-med-and-down">
		<h5 class="center">Menu</h5>
			<!-- <div class="divider"></div> -->
			
			<div class="collection " >
				<a href="profile" class="collection-item">Profile</a>
					<?php
					if(isset($_SESSION["userid"]))  
					{  
					?>
				<a href="#!" class="collection-item">Ajustes de Email</a>
				<a href="#!" class="collection-item">Cambiar Contraseña</a>
				<a href="#!" class="collection-item">Cambiar Nombre</a>
				<a href="#!" class="collection-item">Otros Ajustes</a>
					<?php
					}
					?>
			</div>
	
        </div>
		
		<ul id="navuser" class="sidenav">
		<li><div class="user-view bgsidenav" style="">

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
		
	  <li><a href="profile"><i class="material-icons right">person</i> Perfil</a></li>
	  <?php
					if(isset($_SESSION["userid"]))  
					{  
					?>
	  <div class="divider"></div>
		<li><a href="#"><i class="material-icons right"></i> Ajustes de Email</a></li>
		<li><a href="#"><i class="material-icons right"></i> Cambiar Contraseña</a></li>
		<li><a href="#"><i class="material-icons right"></i> Cambiar Nombre</a></li>
		<li><a href="#"><i class="material-icons right"></i> Otros Ajustes</a></li>
      
	  <?php
					}
					?>
		
	</ul>




