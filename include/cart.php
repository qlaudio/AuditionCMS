<?php
define("ROW_PER_PAGE",100);
require_once('db.php');
//error_reporting(0);
$usersn=$_SESSION["usersn"];
$usernick=$_SESSION["usernick"];
$expireddate="2100-01-01 00:00:00";
$expiredtype=4;
if ($_SESSION["gender"]=="F"){
	$genero=1;
}
else{
	$genero=0;
}

?>

	  <?php
		 if(isset($_POST["Comprar"]))  
		{  
				$query4 = 'SELECT * FROM basket WHERE UserSN=:usersn';
				$consulta4 = $itemdb->prepare($query4);
				$consulta4->bindValue(':usersn', $usersn , PDO::PARAM_INT);
				$consulta4->execute();
				$resultado4 = $consulta4->fetchAll();
				
				foreach($resultado4 as $row) {
					$itemid=$row['ItemID'];
					$basketid=$row['BasketID'];
					
					$query5 = 'SELECT * FROM avatarlist WHERE ItemID=:itemid';
					$consulta5 = $itemdb->prepare($query5);
					$consulta5->bindValue(':itemid', $itemid , PDO::PARAM_INT);
					$consulta5->execute();
					$resultado5 = $consulta5->fetchAll();
					
					foreach($resultado5 as $row) {
						$itemtype=$row['Type'];
						$itemcash=$row['Cash'];
						$itemden=$row['Den'];
						
						if ($itemtype=="h"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_hair(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="p"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_pants(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="s"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_shoes(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="g"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_guitar(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="n"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_hand(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="f"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_face(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="j"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_jacket(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="s,p,j,f,h"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_pets(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="e"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_emotion(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="i"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_interior(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						if ($itemtype=="w"){
							$insert = $itemdb->prepare("INSERT INTO avatar_inventory_wing(UserSN,ItemID,BuyNick,ExpiredType,ExpiredDate)
						values(:usersn, :itemid, :usernick, :expiredtype, :expireddate)
						");
						}
						
						
						
						$insert->bindParam (':usersn',$usersn);
						$insert->bindParam (':itemid',$itemid);
						$insert->bindParam (':usernick',$usernick);
						$insert->bindParam (':expiredtype',$expiredtype);
						$insert->bindParam (':expireddate',$expireddate);
						$insert->execute();
						
						$sumcash=0;
						$sumden=0;
						$query3 = 'SELECT * FROM avatarlist WHERE ItemID=:itemid';
						$statement3 = $itemdb->prepare($query3);
						$statement3->bindValue(':itemid', $itemid , PDO::PARAM_INT);
						$statement3->execute();
						$resultado = $statement3->fetchAll();
						foreach($resultado as $row) {
							$sumcash=$sumcash+$row['Cash'];
							$sumden=$sumden+$row['Den'];
						}
						
						
						$sql6 = "DELETE FROM basket WHERE BasketID=:basketid";
						$deletecart = $itemdb->prepare($sql6);
						$deletecart->bindParam(':basketid', $basketid, PDO::PARAM_INT);   
						$deletecart->execute();
						
					}
					
					
				}
						$query65 = 'SELECT * FROM usercash WHERE UserSN=:usersn';
						
						$consulta65 = $itemdb->prepare($query65);
						$consulta65->bindValue(':usersn', $usersn , PDO::PARAM_INT);
						$consulta65->execute();
						$resultado65 = $consulta65->fetchAll();
				
						foreach($resultado65 as $row) {
							
							$cashactual=$row['Cash'];
						}
						
						$query66 = 'SELECT * FROM userden WHERE UserSN=:usersn';
						
						$consulta66 = $itemdb->prepare($query66);
						$consulta66->bindValue(':usersn', $usersn , PDO::PARAM_INT);
						$consulta66->execute();
						$resultado66 = $consulta66->fetchAll();
				
						foreach($resultado66 as $row) {
							
							$denactual=$row['Den'];
						}
						
						
				
						$cashrestantes=$cashactual-$sumcash;
						$denrestantes=$denactual-$sumden;
				
				
				
				$query7 = 'UPDATE usercash SET Cash=:cashrestantes WHERE UserSN=:usersn';
						
					          
						$consulta7 = $itemdb->prepare($query7);
						$consulta7->bindValue(':cashrestantes', $cashrestantes , PDO::PARAM_INT);
						$consulta7->bindValue(':usersn', $usersn , PDO::PARAM_INT);
						$consulta7->execute();
						$resultado7 = $consulta7->fetchAll();
						
						
				$query8 = 'UPDATE userden SET Den=:denrestantes WHERE UserSN=:usersn';
						
					          
						$consulta8 = $itemdb->prepare($query8);
						$consulta8->bindValue(':denrestantes', $denrestantes , PDO::PARAM_INT);
						$consulta8->bindValue(':usersn', $usersn , PDO::PARAM_INT);
						$consulta8->execute();
						$resultado8 = $consulta8->fetchAll();
				
						
	
					echo "<meta http-equiv='refresh' content='0'>";
		}
	  ?>
<html>
<head>

</head>
<body>
<?php	
	$sumcash=0;
	$sumden=0;
	$search_keyword = '';
	$mincost=10;
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM basket WHERE UserSN=:usersn ORDER BY BasketID DESC ';
	
	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $itemdb->prepare($sql);
	$pagination_statement->bindValue(':usersn', $usersn , PDO::PARAM_INT);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
				}
			}
		}
		$per_page_html .= "</div>";
	}
	
	$query = $sql.$limit;
	$pdo_statement = $itemdb->prepare($query);
	$pdo_statement->bindValue(':usersn', $usersn , PDO::PARAM_INT);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>

<?php
 
                if($row_count > 0)  
                {  
					?>
<form name='frmSearch' action='' method='post'>
<!---- <div style='text-align:right;margin:20px 0px;'><input type='text' name='search[keyword]' placeholder="Buscar" value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'></div>  ---->
<table class="striped">
  <thead>
	<tr>
	  <th class='table-header' width='10%'>ID</th>
	  <th class='table-header' width='50%'>Nombre</th>
	  <th class='table-header' width='15%'>Cash</th>
	  <th class='table-header' width='15%'>Den</th>
	  <th class='table-header' width='10%'></th>
	</tr>
  </thead>
  <tbody id='table-body'>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	
	
		<?php
		$itemid=$row['ItemID'];
		$basketid=$row['BasketID'];
		$query3 = 'SELECT * FROM avatarlist WHERE ItemID=:itemid';
		$statement3 = $itemdb->prepare($query3);
		$statement3->bindValue(':itemid', $itemid , PDO::PARAM_INT);
		$statement3->execute();
		$resultado = $statement3->fetchAll();
		foreach($resultado as $row) {
			$sumcash=$sumcash+$row['Cash'];
			$sumden=$sumden+$row['Den'];
			?>
	
			
		<tr class='table-row'>
		<td><?php echo $row['ItemID']; ?></td>
		<td><?php echo $row['ItemName']; ?></td>
		<td><?php echo $row['Cash']; ?></td>
		<td><?php echo $row['Den']; ?></td>
		<td>
		<?php
		}
		?>
		
	
		
		
		<form method="post" > 
		 <input class="input-field" type="hidden" value="<?php echo $basketid; ?>" name = "delid"  required>
		<button type="submit" class="btn-floating btn-small waves-effect waves-light red darken-1" name="delete"><i class="material-icons">delete</i></button>
		</form>
		<?php
		if(isset($_POST["delete"]))  
		{  
			$delid = $_POST['delid'];
			 
			
				$insert = $itemdb->prepare("DELETE FROM basket WHERE BasketID=:delid");
				$insert->bindParam (':delid',$delid);
				$insert->execute();
				
				echo "<meta http-equiv='refresh' content='0'>";
		}
		
		
		
		?>
		
		</td>
	  </tr>
	  
    <?php
		}
		?>
		<tr>
		<td></td>
	  	<td><b>Total</b></td>
		<td><b><?php echo $sumcash; ?></b></td>
		<td><b><?php echo $sumden; ?></b></td>
		<td></td>
		</tr>
		
		<?php
		
	}
	?>
	
  </tbody>
</table>

<?php echo $per_page_html; ?>
</form>






		
		<center><b><a class="waves-effect purple waves-light btn modal-trigger" href="#modalcarrito"><i class="material-icons right">shopping_cart</i>Continuar</a></b></center>
		
		
		
				<?php
				}
				else{
					echo "<br><center>No hay articulos agregados al carrito.</center>";
				}
?>				
		
		
		
  <div id="modalcarrito" class="modal">
    <div class="modal-content">
	<?php
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
		
		$restden=$den-$sumden;
		$restcash=$cash-$sumcash;
		
	
	
	?>
	
      <center><h4>Resumen de Compra</h4>
	  <div class="divider"></div>
      <p>
	  <!---Costo Total en Cash: <b><?php echo $sumcash; ?></b><br>
	  Costo Total en Den: <b><?php echo $sumden; ?></b><br>--->
	  
	  <table class="centered">
		<tbody>
		<tr>
		<td style="padding: 5px 5px; max-width: 10%;"></td>
		<td style="padding: 5px 5px; max-width: 40%;"><b>Den</b></td>
		<td style="padding: 5px 5px; max-width: 40%;"><b>Cash</b></td>
		</tr>
		<tr>
		<td style="padding: 5px 5px;"><b>Actual</b></td>
		<td style="padding: 5px 5px;"><b><span class="light-green-text"><?php echo $den; ?></span></b></td>
		<td style="padding: 5px 5px;"><b><span class="amber-text"><?php echo $cash; ?></span></b></td>
		</tr>
		<tr>
		<td style="padding: 5px 5px;"><b>Valor</b></td>
		<td style="padding: 5px 5px;"><b><span class="deep-orange-text">-<?php echo $sumden; ?></span></b></td>
		<td style="padding: 5px 5px;"><b><span class="red-text">-<?php echo $sumcash; ?></span></b></td>
		</tr>
		<tr>
		<td style="padding: 5px 5px;"><b>Restante</b></td>
		<td style="padding: 5px 5px;"><div class="divider"></div><b><span class="light-green-text"><?php echo $restden; ?></span></b></td>
		<td style="padding: 5px 5px;"><div class="divider"></div><b><span class="amber-text"><?php echo $restcash; ?></span></b></td>
		</tr>
</tbody>
</table>
	  
	  
	  
	  
	  
	  <br>
	  ¿Realmente deseas comprar todos los items de tu carrito?<br>
	  
	  <?php
	  if ($restden>=0 && $restcash>=0){
		  
	  
	  ?>
	  <form method="post"> 
	 
	  <input  type="submit" name="Comprar" style=" margin-top:10px;" class="btn waves-effect waves-light amber"  value="Comprar" />
	  </form> 
	  
	  <?php
	  }
	  else{
		  echo "<br><b>No tienes suficientes Den o Cash</b>";
		  
	  }
	  ?>

	  
	  
	  
	  
	  </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-purple btn-flat">Cerrar</a>
    </div>
  </div>





</body>
</html>