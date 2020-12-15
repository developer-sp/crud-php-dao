<?php
require 'config.php';
require 'dao/ClienteDaoMysql.php';
$clienteDao = new ClienteDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){

    $clienteDao->delete($id);    

} 
header("Location: index.php");
exit;


?>

