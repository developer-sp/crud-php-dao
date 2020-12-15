<?php
require_once 'models/Fatura.php';

class FaturaDaoMysql implements FaturaDAO{

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }


    public function add(Fatura $f){
        $sql = $this->pdo->prepare("INSERT INTO faturas (valor, vencimento, idcliente) VALUES (:valor, :vencimento, :idcliente)");
        $sql->bindValue(":valor", $f->getValor());
        $sql->bindValue(":vencimento", $f->getVencimento());
        $sql->bindValue(":idcliente", $f->getIdcliente());
        $sql->execute();

        $f->setId( $this->pdo->lastInsertId() );
        return $f;

    }

    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM faturas");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();            

            foreach($data as $item){
                
                $f = new Fatura();
                $f->setId($item['idfatura']);
                $f->setValor($item['valor']);
                $f->setVencimento($item['vencimento']);
                $f->setIdcliente($item['idcliente']);                
                $array[] = $f;
            }

        }

        return $array;

    }

    public function findById($id){

        $sql = $this->pdo->prepare("SELECT * FROM faturas WHERE idfatura = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){

            $data = $sql->fetch();

            $f = new Fatura();
            $f->setId($data['idfatura']);
            $f->setValor($data['valor']);
            $f->setVencimento($data['vencimento']);
            $f->setIdcliente($data['idcliente']);

            return $f;

        } else {
            
            return false;
        }

    }

    public function update(Fatura $f){

        $sql = $this->pdo->prepare("UPDATE faturas SET valor = :valor, vencimento = :vencimento, idcliente = :idcliente WHERE idfatura = :id");
        $sql->bindValue(":valor", $f->getValor());
        $sql->bindValue(":vencimento", $f->getVencimento());
        $sql->bindValue(":idcliente", $f->getIdcliente());
        $sql->bindValue(":id", $f->getId());
        $sql->execute();

        return true;

    }

    public function delete($id){

        $sql = $this->pdo->prepare("DELETE FROM faturas WHERE idfatura = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
    }
    
}
