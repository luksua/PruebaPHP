<?php

class Conexion
{
    private $mySQLI;
    private $sql;
    private $result;
    private $filas;
    private $conn;
    public function abrir()
    {
        $this->mySQLI = new mysqli("localhost", "root", "", "tienda_tenis");
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
        return $this->conn->error;
    }
}