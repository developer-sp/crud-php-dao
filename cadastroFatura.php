<?php 


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=width-device,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<title>Cadastrar nova fatura</title>
	</head>

	<body>

	<div class="container">

    <h1 class="display-4">Cadastrar nova fatura</h1>

    <form method="POST" action="cadastroFatura_action.php">

    <div class="form-group">
        <label for="inputValor">Valor</label>
        <input type="text" class="form-control" name="valor" id="inputValor" placeholder="Digite o Valor">
    </div>

    <div class="form-group">
        <label for="inputVencimento">Vencimento</label>
        <input type="date" class="form-control" name="vencimento" id="inputVencimento" placeholder="Digite a data">
    </div>

    <div class="form-group">
        <label for="inputIdcliente">Id do cliente</label>
        <input type="" class="form-control" name="idcliente" id="inputVencimento" placeholder="Digite o id">
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

        
    </form>


    <br />

	</div>

		<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	</body>

</html>