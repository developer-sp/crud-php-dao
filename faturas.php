<?php 
require 'config.php';
require 'dao/FaturaDaoMysql.php';
$faturaDao = new FaturaDaoMysql($pdo);

$lista = $faturaDao->findAll();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=width-device,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<title></title>
	</head>

	<body>

	<div class="container">

		<div class="row">

			<a class="col-4 btn btn-primary" href="cadastroFatura.php">Cadastrar Nova Fatura</a>

			<div class="col-4"></div>

			<a class=" col-4 btn btn-primary" href="index.php">Consultar Clientes</a>
		</div>

		<br />

		<table class="table table-hover" >

			<tr>
				<th>ID</th>
				<th>VALOR</th>
				<th>VENCIMENTO</th>
				<th>ID CLIENTE</th>
				<th>EDITAR</th>
				<th>EXCLUIR</th>
			</tr>

			<?php
			
				foreach($lista as $fatura): ?>

					<tr>
						<td><?=$fatura->getId();?></td>
						<td><?=$fatura->getValor();?></td>
						<td><?=$mysqldate = date( 'd/m/Y', strtotime( $fatura->getVencimento() ) );?></td>
						<td><?=$fatura->getIdcliente();?></td>				
						<td> <a class="btn btn-warning" href="editarFatura.php?id=<?=$fatura->getId();?>">Editar</a></td>
						<td><a class= "btn btn-danger" href="excluirFatura.php?id=<?=$fatura->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></td>
					</tr>

				<?php endforeach; ?>
			
		</table>

	</div>

		<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	</body>

</html>












