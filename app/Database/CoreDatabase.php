<?php

declare(strict_types=1);

namespace App\Database;

use App\Interface\DatabaseInterface;
use App\Logs\MainLogger;
use Exception;
use PDOException;

class CoreDatabase
{
    private DatabaseInterface $conn;
    private MainLogger $logger;

    public function __construct(DatabaseInterface $database, MainLogger $log)
    {
        $this->conn = $database;
        $this->logger = $log;
    }

    public function selectStatementsById()
    {
        $test = $this->conn->getDbConnection()->query("SELECT * FROM test");
        $item = $test->fetchAll();
        return $item;
    }

    public function insertNewUser(int $type = NULL, object $item)
    {
        /**
         * InsertNewUser
         *
         * Type can receive number 1 or 2
         * Number 1 means that the user is a natural person
         * Number 2 means that the user is a legal person
         * 
        */

        if($type != NULL && !empty($item)){
            $flag = false;

            switch ($type) {
                case 1:
                    try {
                        $verify = $this->verifyIfDocummentAlredyExist($item->getUserCpf());

                        if($verify === true){
                            $sql = $this->conn->getDbConnection()->prepare('INSERT INTO
                            usuarios (nome, senha, cpf, rg, data_nasc, telefone, endereco)
                            VALUES (:nome, :senha, :cpf, :rg, :dataNasc, :telefone, :endereco)');
    
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
                        }

                    } catch (PDOException $e){
                        $this->logger->setLog('Erro ao criar no usuário', [
                            'Número da conta: ' => $item->getUserAccountNumber(),
                            'Error' => $e->getMessage()
                        ]);
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

                $this->logger->setLog('Nova conta criada', [
                    'Número da conta: ' => $item->getUserAccountNumber(),
                    'CPF: ' => $item->getUserCpf()
                ]);
            }
        }

    }

    public function depositValue(object $item): void
    {
        if($item != NULL){
            try {
                $sql = $this->conn->getDbConnection()->prepare("UPDATE conta set saldo=(saldo+:value) WHERE numero_conta=:account");
                $sql->bindValue(':value', $item->getTransictionValue());
                $sql->bindValue(':account', $item->getAccountNumber());
                $sql->execute();

                if($sql->rowCount() > 0){
                    try {
                        $sql = $this->conn->getDbConnection()->prepare('INSERT INTO extrato VALUES(
                            2, :conta, "Deposito", :valor
                        )');
    
                        $sql->bindValue(':conta', $item->getAccountNumber());
                        $sql->bindValue(':valor', $item->getTransictionValue());
                        $sql->execute();
    
                        $this->logger->setLog('Novo deposito feito', [
                            'Conta' => $item->getAccountNumber(),
                            'Valor: ' => $item->getTransictionValue(),
                        ]);

                    } catch(PDOException $e) {
                        $this->logger->setLog('Erro ao executar extrato do deposito', [
                            'Conta' => $item->getAccountNumber(),
                            'Valor: ' => $item->getTransictionValue(),
                            'Error' => $e->getMessage()
                        ]);
                    }

                }

            } catch (PDOException $e){

                $this->logger->setLog('Falha em depositar', [
                    'Conta' => $item->getAccountNumber(),
                    'Valor: ' => $item->getTransictionValue(),
                    'Error: ' => $e->getMessage()
                ]);
            }

        }
    }

    public function transferValue(object $item): void
    {
        try {
            if($item != NULL){
                $sql = $this->conn->getDbConnection()->prepare("UPDATE conta set saldo=(saldo-:value) WHERE numero_conta=338869337");
                $sql->bindValue(':value', $item->getTransictionValue());
                //$sql->bindValue(':account', $item->getAccountNumber());
                $sql->execute();
    
                if($sql -> rowCount() > 0){
                    $sql = $this->conn->getDbConnection()->prepare("UPDATE conta set saldo=(saldo+:value) WHERE numero_conta=:account");
                    $sql->bindValue(':value', $item->getTransictionValue());
                    $sql->bindValue(':account', $item->getAccountNumber());
                    $sql->execute();

                    $this->logger->setLog('Transferência realizada', [
                        'De: ' => 362072503,
                        'Para' => $item->getAccountNumber(),
                        'Valor: ' => $item->getTransictionValue()
                    ]);
                }
            }
        } catch (PDOException $e){
            $this->logger->setLog('Falha na hora de transferir', [
                'De: ' => 362072503,
                'Para' => $item->getAccountNumber(),
                'Valor: ' => $item->getTransictionValue(),
                'Error: ' => $e->getMessage()
            ]);
        }

    }

    public function withdrawnValue(object $item)
    {
        if($item != NULL){
            try {
                $sql = $this->conn->getDbConnection()->prepare("UPDATE conta set saldo=(saldo-:value) WHERE numero_conta=:account");
                $sql->bindValue(':value', $item->getTransictionValue());
                $sql->bindValue(':account', $item->getAccountNumber());
                $sql->execute();

                $this->logger->setLog('Saque realizado', [
                    'Conta: ' => $item->getAccountNumber(),
                    'Valor: ' => $item->getTransictionValue()
                ]);

            } catch (PDOException $e){

                $this->logger->setLog('Falha ao tentar realizar saque', [
                    'Conta: ' => 362072503,
                    'Error' => $e->getMessage()
                ]);
                
            }

        }
    }

    public function verifyIfDocummentAlredyExist(int|string $data): bool
    {
        if($data){
            try {

                $sql = $this->conn->getDbConnection()->query("SELECT * FROM usuarios WHERE cpf='$data' OR cnpj='$data'");
    
                if($sql->rowCount() > 0){

                    $this->logger->setLog('Falha ao tentar criar novo usuário', [
                        'Error' => 'Usuário já existente'
                    ]);

                    return false;
                }

                return true;
    
            } catch (PDOException $e){
    
                $this->logger->setLog('Erro na tentativa de verificar usuário', [
                    'Error' => $e->getMessage()
                ]);
                
            }
        }

        return false;

    }

}