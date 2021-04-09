<?php

class Conexion
{
    private $conect;
    public function __construct()
    {
        $connectionString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .  ";" . DB_CHARSET; //  ";.DB_CHARSET.";
        try {
            $this->conect = new PDO($connectionString, DB_USER, BD_PASSWORD);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("ERROR" . $e->getMessage(), 1);
            //$this->conect='error de conexion';
            //echo "ERROR:".$e->getMessage();
        }
    }
    public function connect()
    {
        return $this->conect;
    }
}
