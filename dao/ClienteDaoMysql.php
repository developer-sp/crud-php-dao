<?php
require_once 'models/Cliente.php';

class ClienteDaoMysql implements ClienteDAO{

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }


    public function add(Cliente $c){
        $sql = $this->pdo->prepare("INSERT INTO cliente (nome, cpf, idade, cadastro) VALUES (:nome, :cpf, :idade, NOW())");
        $sql->bindValue(":nome", $c->getNome());
        $sql->bindValue(":cpf", $c->getCpf());
        $sql->bindValue(":idade", $c->getIdade());
        $sql->execute();

        $c->setId( $this->pdo->lastInsertId() );
        return $c;

    }

    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM cliente");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();            

            foreach($data as $item){
                
                $cad = new Cliente();
                $cad->setId($item['idcliente']);
                $cad->setNome($item['nome']);
                $cad->setCpf($item['cpf']);
                $cad->setIdade($item['idade']);
                $cad->setCadastro($item['cadastro']);
                $array[] = $cad;
            }

        }

        return $array;

    }

    public function findById($id){

        $sql = $this->pdo->prepare("SELECT * FROM cliente WHERE idcliente = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){

            $data = $sql->fetch();

            $c = new Cliente();
            $c->setId($data['idcliente']);
            $c->setNome($data['nome']);
            $c->setCpf($data['cpf']);
            $c->setIdade($data['idade']);

            return $c;            

        } else {
            
            return false;
        }

    }

    public function update(Cliente $c){

        $sql = $this->pdo->prepare("UPDATE cliente SET nome = :nome, cpf = :cpf, idade = :idade WHERE idcliente = :id");
        $sql->bindValue(":nome", $c->getNome());
        $sql->bindValue(":cpf", $c->getCpf());
        $sql->bindValue(":idade", $c->getIdade());
        $sql->bindValue(":id", $c->getId());
        $sql->execute();

        return true;

    }

    public function delete($id){

        $sql = $this->pdo->prepare("DELETE FROM cliente WHERE idcliente = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();


        
    }
    
}
