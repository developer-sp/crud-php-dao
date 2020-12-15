<?php 
require 'config.php';
require 'dao/ClienteDaoMysql.php';
$clienteDao = new ClienteDaoMysql($pdo);

$lista = $clienteDao->findAll();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=width-device,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<title>Clientes</title>
	</head>

	<body>
	<div class="container">

		<div class="row">
			<a class=" col-4 btn btn-primary" href="cadastro.php">Cadastrar Novo Cliente</a>
			<div class="col-4"></div>
			<a class="col-4 btn btn-primary" href="faturas.php">Consultar Faturas</a>
		</div>

		<br />

		<table class="table table-hover">

			<tr>
				<th>ID</th>
				<th>NOME</th>
				<th>CPF</th>
				<th>IDADE</th>
				<th>DATA CADASTRO</th>
				<th>EDITAR</th>
				<th>EXCLUIR</th>
			</tr>

			<?php
			
				foreach($lista as $cliente): ?>

					<tr>
						<td><?=$cliente->getId();?></td>
						<td><?=$cliente->getNome();?></td>
						<td><?=$cliente->getCpf();?></td>
						<td><?=$cliente->getIdade();?></td>
						<td><?=$mysqldate = date( 'd/m/Y', strtotime( $cliente->getCadastro() ) );?></td>
						<td> <a class="btn btn-warning" href="editar.php?id=<?=$cliente->getId();?>">Editar</a></td>
						<td><a class="btn btn-danger" href="excluir.php?id=<?=$cliente->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></td>
					</tr>

				<?php endforeach; ?>
			
		</table>

	</div>

		<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	</body>

</html>


