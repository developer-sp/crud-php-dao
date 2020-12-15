<?php
require 'config.php';
require 'dao/FaturaDaoMysql.php';
$faturaDao = new FaturaDaoMysql($pdo);


$id = filter_input(INPUT_POST, 'id');
$valor = filter_input(INPUT_POST, 'valor');
$vencimento = filter_input(INPUT_POST, 'vencimento');
$idcliente = filter_input(INPUT_POST, 'idcliente');

function dateEmMysql($dateSql){
    $ano= substr($dateSql, 6);
    $mes= substr($dateSql, 3,-5);
    $dia= substr($dateSql, 0,-8);
    return $ano."-".$mes."-".$dia;
}

$vencimento = dateEmMysql($vencimento);

if($id  && $valor && $vencimento && $idcliente ){

    $fatura = $faturaDao->findById($id);

    $fatura->setValor($valor);
    $fatura->setVencimento($vencimento);
    $fatura->setIdcliente($idcliente);

    
    $faturaDao->update($fatura);

    header("Location: faturas.php");
    exit;
  
} else{
    
    header("Location: editarFatura.php?id=".$id);
    exit;
    
}
