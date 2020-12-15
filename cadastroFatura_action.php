<?php
require 'config.php';

require 'dao/FaturaDaoMysql.php';
$faturaDao = new FaturaDaoMysql($pdo);

$valor = filter_input(INPUT_POST, 'valor');
$vencimento = filter_input(INPUT_POST, 'vencimento');
$idcliente = filter_input(INPUT_POST, 'idcliente');

if($valor && $vencimento && $idcliente){

    $novaFatura = new Fatura();
    $novaFatura->setValor ($valor);
    $novaFatura->setVencimento($vencimento);
    $novaFatura->setIdcliente($idcliente);

    $faturaDao->add($novaFatura);

    header("Location: faturas.php");

} else{
    header("Location: cadastroFatura.php");
}
