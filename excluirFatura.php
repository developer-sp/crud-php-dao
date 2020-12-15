<?php
require 'config.php';
require 'dao/FaturaDaoMysql.php';
$faturaDao = new FaturaDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){

    $faturaDao->delete($id);    

} 
header("Location: faturas.php");
exit;


?>

