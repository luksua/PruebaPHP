<?php

class GestorAdmin{
    public function login($email, $password){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
        $conexion->consultar($sql);
        $result = $conexion->getResult();
        $conexion->cerrar();
        if ($result && $row = $result->fetch_assoc()) {
            if (password_verify($password, $row["contrasena"])){
                return 1;
            }
        } else {
            return 2;
        }
    }
    public function loginDatos($email){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
        $conexion->consultar($sql);
        $result = $conexion->getResult();
        $conexion->cerrar();
        $fila = $result->fetch_assoc();
        if ($fila["rol"] == "cliente"){
            return 1;
        } else {
            return 2;
        }
    }
    public function registro($name, $email, $password){
        $conexion = new Conexion();
        $conexion->abrir();
        $passwordH = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios VALUES(null, '$name', '$email', '$passwordH', 'cliente')";
        $conexion->consultar($sql);
        $filas = $conexion->getFilas();
        $conexion->cerrar();
        return $filas;
    }
    public function datos($email){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT id FROM usuarios WHERE correo='$email'";
        $conexion->consultar($sql);
        $result = $conexion->getResult();
        $conexion->cerrar();
        return $result;
    }
}