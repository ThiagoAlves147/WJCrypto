<?php

declare(strict_types=1);

namespace App\Database;

use App\Interface\DatabaseInterface;
use Exception;
use PDOException;

class CoreDatabase
{
    private DatabaseInterface $conn;

    public function __construct(DatabaseInterface $database)
    {
        $this->conn = $database;
    }

    public function selectStatementsById(): object
    {
        $test = $this->conn->getDbConnection()->query("SELECT * FROM test WHERE name='Thiago'");
        $item = $test->fetch();
        return $item;
    }

    public function insertNewUser(int $type = NULL, object $item): void
    {
        /**
         * InsertNewUser
         *
         * Type can receive number 1 or 2
         * Number 1 means that the user is an pessoa fisica
         * Number 2 means that the user is an legal person
         * 
         * @return 
        */

        if($type != NULL && !empty($item)){
            $flag = false;

            switch ($type) {
                case 1:
                    try {
                        $sql = $this->conn->getDbConnection()->prepare('INSERT INTO
                        usuarios (numero_conta, nome, senha, cpf, rg, data_nasc, telefone, endereco)
                        VALUES (:nConta, :nome, :senha, :cpf, :rg, :dataNasc, :telefone, :endereco)');

                        $sql->bindValue(':nConta', $item->getUserAccountNumber());
                        $sql->bindValue(':nome', $item->getUserName());
                        $sql->bindValue(':senha', $item->getUserPassword());
                        $sql->bindValue(':cpf', $item->getUserCpf());
                        $sql->bindValue(':rg', $item->getUserRg());
                        $sql->bindValue(':dataNasc', $item->getUserBirthDay());
                        $sql->bindValue(':telefone', $item->getUserPhone());
                        $sql->bindValue(':endereco', $item->getUserAdress());
                        $sql->execute();

                        if($sql->rowCount() > 0){
                            $flag = true;
                            $item->setUserId($this->conn->getDbConnection()->lastInsertId());
                        }

                    } catch (PDOException $e){
                        var_dump($e->getMessage());
                    }
                case 2:
                    try {
    
                    } catch (Exception $e){
    
                    }
            }

            if($flag === true){
                $sql = $this->conn->getDbConnection()->prepare('INSERT INTO
                conta (id_usuario, numero_conta) VALUES (:idUsuario, :nConta)');

                $sql->bindValue(':idUsuario', $item->getUserId());
                $sql->bindValue(':nConta', $item->getUserAccountNumber());
                $sql->execute();
            }
        }

    }
}