<?php
require 'config.php';
require 'dao/FaturaDaoMysql.php';
$faturaDao = new FaturaDaoMysql($pdo);

$fatura = false;

$id = filter_input(INPUT_GET, 'id');

if($id){

    $fatura = $faturaDao->findById($id);
    
} 

if($fatura === false){
    header("Location: faturas.php");
    exit;
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=width-device,initial-scale=1,shrink-to-fit=no" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<title>Editar Fatura</title>
	</head>

	<body>

	<div class="container">

        <h1 class="display-4">Editar fatura</h1>

        <br />

        <form method="POST" action="editarFatura_action.php">

            <input type="text" hidden name="id" value="<?=$fatura->getId();?>" />

            <div class="form-group">
                <label for="inputValor">Valor</label>
                <input type="text" class="form-control" name="valor" id="inputValor" value="<?=$fatura->getValor();?>" placeholder="Digite o Valor">
            </div>

            <div class="form-group">
                <label for="inputVencimento">Vencimento</label>
                <input type="text" class="form-control" name="vencimento" id="inputVencimento" value="<?php echo $mysqldate = date( 'd-m-Y', strtotime( $fatura->getVencimento() ) ); ?>" placeholder="Digite a data">
            </div>

            <div class="form-group">
                <label for="inputIdcliente">Id do cliente</label>
                <input type="number" class="form-control" name="idcliente" id="inputVencimento" value="<?=$fatura->getIdcliente();?>" placeholder="Digite o id">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>

        </form>



	</div>

		<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	</body>

</html>