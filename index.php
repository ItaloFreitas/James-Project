<?php include_once 'header.php'; ?>
	<div class="container-fluid">
		<form class="form" action="enviar.php" method="POST">
			<tr>
				<td><label>Nome</label></td>
				<td><input type="text" name="nome" class="form-control" placeholder="seu nome"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input type="text" name="email" class="form-control" placeholder="seu nome"></td>
			</tr>
			<tr>
				<td><input class="btn btn-success" type="submit" value="enviar"></td>
			</tr>
		</form> 
	</div>
	<div class="bs-example container-fluid" data-example-id="striped-table">
		<table class="table table-striped">
			<thead><h1 class="titulo-site">Usuarios Cadastrados</h1></thead>
			<?php 
				 $pdo = new PDO('mysql:host=localhost;dbname=ntec','root','');
				 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				 $consulta = $pdo->query("SELECT * FROM tab2"); 	

			 ?>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Funções</th>
				</tr>
			<tbody>
				<tr>
					<?php while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
					<td><?php echo $linha['id']; ?></td>
					<td><?php echo $linha['nome']; ?></td>
					<td><?php echo $linha['email']; ?></td>
					<td>
						<a href="?excluir=true&id=<?php echo $linha['id']; ?>">Excluir</a>
						<a href="#">Editar</a>
					</td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	</div>
<?php 

	@$id = $_GET['id'];

	try {
	$stmt = $pdo->prepare('DELETE FROM tab2 WHERE id = :id');
	  $stmt->bindParam(':id', $id); 
	  $stmt->execute();
	    

	} catch(PDOException $e) {
	  echo 'Error: ' . $e->getMessage();
	}

 ?>
<?php


include_once 'footer.php' ?>