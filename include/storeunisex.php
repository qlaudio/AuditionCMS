<?php
define("ROW_PER_PAGE",100);
require_once('db.php');
error_reporting(0);



if ($_SESSION["gender"]=="F"){
	$genero=1;
}
else{
	$genero=0;
}

if(isset($added))  {?>


<script type="text/javascript">
	$('#modal5').openModal();
	</script>
	
	<?php
}

?>
<html>
<head>

</head>
<body>
<?php	
	$search_keyword = '';
	$mincost=10;
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM avatarlist WHERE Type=:tipo and Den>=:mincost and ItemName LIKE :keyword OR ItemID LIKE :keyword and Cash>=:mincost and Type=:tipo ORDER BY New DESC ';
	
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
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->bindValue(':tipo', $tipo , PDO::PARAM_STR);
	$pagination_statement->bindValue(':mincost', $mincost , PDO::PARAM_STR);
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
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->bindValue(':tipo', $tipo , PDO::PARAM_STR);
	$pdo_statement->bindValue(':mincost', $mincost , PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	
	
	
	
	
	?>
<div id="modal5" class="modal">
				<center><div class="modal-content">
					<h4>¡Agregado al Carrito!</h4>
					<p>Tu artículo ha sido agregado al carrito exitosamente.</p><br><br>
					<a href="carrito" class="waves-effect waves-light btn purple"><i class="material-icons right">shopping_cart</i>Ver Carrito</a>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-purple btn-flat">Cerrar</a>
				</div></center>
				
			</div>












<form name='frmSearch' action='' method='post'>
<div style='text-align:right;margin:20px 0px;'><input type='text' name='search[keyword]' placeholder="Buscar" value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'></div>
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
	  <tr class='table-row'>
		<td><?php echo $row['ItemID']; ?></td>
		<td><?php echo $row['ItemName']; ?></td>
		<td><?php echo $row['Cash']; ?></td>
		<td><?php echo $row['Den']; ?></td>
		<td>
		
		<?php
		// if session start sino mostrar otro color y decir que inicie sesion con un cuadro flotante 
		if(isset($_SESSION["userid"]))  
		{  
		
		
			
			
		?>	
		
		
		
		
		<form method="post" > 
		 <input class="input-field" type="hidden" value="<?php echo $row['ItemID']; ?>" name = "addid"  required>
		<button type="submit" class="btn-floating btn-small waves-effect waves-light purple darken-1" name="agregar"><i class="material-icons">shopping_cart</i></button>
		</form>
		<?php
		if(isset($_POST["agregar"]))  
		{  
			$addid = $_POST['addid'];
			$addid = $_POST['addid'];
			//if ($row['ItemID']==$addid){
				$usersn=$_SESSION["usersn"];
				$date = date("Y-m-d H:i:s");
				$insert = $itemdb->prepare("INSERT INTO basket(UserSN,ItemID,PutDate)
				values(:usersn, :addid, :date)
				");
				$insert->bindParam (':usersn',$usersn);
				$insert->bindParam (':addid',$addid);
				$insert->bindParam (':date',$date);
				$insert->execute();
				
			
		
	
		}
		
		
		
		}
		else{ ?>
			<a onclick="M.toast({html: '¡Inicia sesión para agregar al carro!', classes: 'rounded'})" style="z-index: 2;" class="btn-floating btn-small waves-effect waves-light grey" ><i class="material-icons">shopping_cart</i></a>
		<?php	
		}
		?>
		</td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>
<?php echo $per_page_html; ?>
</form>
</body>
</html>