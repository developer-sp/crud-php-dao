<?php 

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=width-device,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<title>Cadastrar novo cliente</title>
	</head>

	<body>

	<div class="container">

        
        <h1 class="display-4">Cadastrar Cliente</h1>

        <br />


        <form method="POST" action="adicionar_action.php">
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Digite o Nome completo">
                
            </div>

            <div class="form-group">
                <label for="inputCpf">Cpf</label>
                <input type="text" class="form-control" name="cpf" id="inputCpf" placeholder="Digite o Cpf">
                
            </div>

            <div class="form-group">
                <label for="inputIdade">Idade</label>
                <input type="text" class="form-control" name="idade" id="inputIdade" placeholder="Digite a Idade">
                
            </div>

            <br />
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

	</div>

		<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	</body>

</html>