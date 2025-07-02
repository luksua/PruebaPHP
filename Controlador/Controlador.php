<?php

class Controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function login($email, $password)
    {
        $gestorAdmin = new GestorAdmin();
        $result = $gestorAdmin->login($email, $password);
        switch ($result) {
            case '1':
                $_SESSION["email"] = $email;
                $result2 = $gestorAdmin->loginDatos($email);
                if ($result2 == 2) {
                    $_SESSION["rol"] = "admin";
                    require_once "Vista/html/adminProductos.html";
                } else {
                    $_SESSION["rol"] = "cliente";
                    require_once "Vista/html/cliente.html";
                }
                break;
            case '2':
                echo "<script>alert('Intente nuevamente');
                window.location='index.php?accion=admin'
                </script>";
                break;
        }
    }
    public function logout()
    {
        if (isset($_SESSION["email"])) {
            unset($_SESSION["email"]);
        }
        session_destroy();
        header("location: index.php?accion=catalogo");
    }
    public function registro($name, $email, $password, $password2)
    {
        if (empty($name) || empty($email) || empty($password) || empty($password2)) {
            echo "<script>alert('Ingrese todos los datos');
                window.location='index.php?accion=registro'
                </script>";
        } else {
            if ($password != $password2) {
                echo "<script>alert('Las contraseñas no coinciden');
                window.location='index.php?accion=registro'
                </script>";
            } else {
                $gestorAdmin = new GestorAdmin();
                $filas = $gestorAdmin->registro($name, $email, $password);
                if ($filas > 0) {
                    $_SESSION["email"] = $email;
                    $result2 = $gestorAdmin->loginDatos($email);
                    if ($result2 == 2) {
                        $_SESSION["rol"] = "admin";
                    } else {
                        $_SESSION["rol"] = "cliente";
                    }
                    echo "<script>alert('Usuario registrado');
                    window.location='index.php?accion=catalogo'
                    </script>";
                } else {
                    echo "<script>alert('Intente nuevamente');
                    window.location='index.php?accion=registro'
                    </script>";
                }
            }
        }
    }
    // public function datos(){
    //     $email = $_SESSION["email"];
    //     $gestorAdmin = new GestorAdmin();
    //     $result = $gestorAdmin->datos($email);
    //     require_once "Vista/html/solicitarCompra.php";
    // }
}