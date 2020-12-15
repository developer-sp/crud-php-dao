<?php

class Fatura{
    private $id;
    private $valor;
    private $vencimento;
    private $idcliente;

    public function getId(){
        return $this->id;
    }

    public function setId($i){
        $this->id = trim($i);
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($v){
        $this->valor = trim($v);
    }

    public function getVencimento(){
        return $this->vencimento;
    }

    public function setVencimento($d){
        $this->vencimento = trim($d);
    }

    public function getIdcliente(){
        return $this->idcliente;
    }

    public function setIdcliente($c){
        $this->idcliente = trim($c);

    }

}

interface FaturaDAO{
    public function add(Fatura $f);
    public function findAll();
    public function findById($id);
    public function update(Fatura $f);
    public function delete($id);
}