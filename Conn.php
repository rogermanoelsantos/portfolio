<?php

abstract class Conn
{
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbname = "roger3";
    public int $port = 3306;
    public object $connect;

    public function connectDb()
    {
        try{
            //Conexao com a porta
            //$this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname='. $this->dbname, $this->user, $this->pass);
            
            //Conexao sem a porta
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname='. $this->dbname, $this->user, $this->pass);
            
            //echo "Conexão com banco de dados realizado com sucesso!<br>";
            return $this->connect;
        }catch (Exception $err){
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador adm@empresa.com');
            //echo "Erro: Conexão com banco de dados não realizado com sucesso! Erro gerado: " . $err->getMessage();
        }
    }
}