<?php
require 'config.php';
require 'dao/ClienteDaoMysql.php';
$clienteDao = new ClienteDaoMysql($pdo);


$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$idade = filter_input(INPUT_POST, 'idade');

if($nome && $cpf && $idade && $id){

    $cliente = $clienteDao->findById($id);

    $cliente->setNome($nome);
    $cliente->setCpf($cpf);
    $cliente->setIdade($idade);

    $clienteDao->update($cliente);

    header("Location: index.php");
    exit;

  
} else{
    
    header("Location: editar.php?id=".$id);
    exit;
    
}
