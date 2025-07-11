<?php

class Conexion
{
    private $mySQLI;
    private $sql;
    private $result;
    private $filas;
    private $conn;
    public function __construct()
    {
        $this->abrir();
    }
    public function abrir()
    {
        $this->mySQLI = new mysqli("localhost", "root", "", "tienda_electronicos");
    }
    public function cerrar()
    {
        $this->mySQLI->close();
    }
    public function consultar($sql)
    {
        $this->sql = $sql;
        $this->result = $this->mySQLI->query($sql);
        $this->filas = $this->mySQLI->affected_rows;
    }
    public function getResult()
    {
        return $this->result;
    }
    public function getFilas()
    {
        return $this->filas;
    }
    public function getError()
    {
        if ($this->mySQLI) {
            return $this->mySQLI->error;
        } else {
            return "No hay conexión a la base de datos.";
        }
    }
    public function getId(){
        return $this->mySQLI->insert_id;
    }
}