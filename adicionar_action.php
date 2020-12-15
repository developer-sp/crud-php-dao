<?php
require 'config.php';
require 'dao/ClienteDaoMysql.php';
$clienteDao = new ClienteDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$idade = filter_input(INPUT_POST, 'idade');

if($nome && $cpf && $idade){

    $novoCliente = new Cliente();
    $novoCliente->setNome ($nome);
    $novoCliente->setCpf($cpf);
    $novoCliente->setIdade($idade);

    $clienteDao->add($novoCliente);

    header("Location: index.php");

} else{
    header("Location: cadastro.php");
}
