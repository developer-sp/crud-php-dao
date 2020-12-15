<?php

class Cliente{
    private $id;
    private $nome;
    private $cpf;
    private $idade;
    private $cadastro;

    public function getId(){
        return $this->id;
    }

    public function setId($i){
        $this->id = trim($i);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = ucwords(trim($n));
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($c){
        $this->cpf = trim($c);
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($y){
        $this->idade = trim($y);

    }

    public function getCadastro(){
        return $this->cadastro;
    }

    public function setCadastro($cad){
        $this->cadastro = $cad;
    }
}

interface ClienteDAO{
    public function add(Cliente $cad);
    public function findAll();
    public function findById($id);
    public function update(Cliente $cad);
    public function delete($id);
}