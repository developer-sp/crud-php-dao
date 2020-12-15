<?php
require 'config.php';
require 'dao/ClienteDaoMysql.php';
$clienteDao = new ClienteDaoMysql($pdo);

$cliente = false;

$id = filter_input(INPUT_GET, 'id');

if($id){

    $cliente = $clienteDao->findById($id);
    
} 

if($cliente === false){
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=width-device,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<title>Editar Cliente</title>
	</head>

	<body>

	<div class="container">

    <h1 class="display-4">Editar Cliente</h1>

    <form method="POST" action="editar_action.php">

        <input type="text" hidden name="id" value="<?=$cliente->getId();?>" />

        <div class="form-group">
            <label for="inputNome">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?=$cliente->getNome();?>" id="inputNome" placeholder="Digite o Nome completo">
        </div>

        <div class="form-group">
            <label for="inputCpf">Cpf</label>
            <input type="text" class="form-control" value="<?=$cliente->getCpf();?>" name="cpf" id="inputCpf" placeholder="Digite o Cpf">
                
        </div>

        <div class="form-group">
            <label for="inputIdade">Idade</label>
            <input type="text" class="form-control"  value="<?=$cliente->getIdade();?>" name="idade" id="inputIdade" placeholder="Digite a Idade">                
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>

	</div>

		<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	</body>

</html>
