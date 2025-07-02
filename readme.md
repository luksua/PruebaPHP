# Proyecto Venta de Tenis
Sistema web para la gestión y venta de tenis deportivos. Incluye roles de administrador y cliente. Permite a los usuarios registrarse, iniciar sesión, navegar por el catálogo y realizar compras.

### Descripción
Este proyecto es una aplicación web desarrollada en PHP que simula una tienda de tenis. Los usuarios pueden registrarse, iniciar sesión, ver productos y realizar compras. Los administradores pueden gestionar el catálogo de productos. 

## Caracteristicas
- Registro y autenticación de usuarios
- Roles: administrador y cliente
- Catálogo de productos
- Gestión de sesión
- Alertas y redirecciones automáticas
- Estructura MVC básica
- CRUD de productos
- CRUD de categorías

## Tecnologías utilizadas
- Frontend
    - HTML
    - CSS
- Backend
    - PHP
    - JavaScript
- Base de Datos
    - MySQL
- Entorno Local
    - XAMPP

## Instalación
1. Descargar el proyecto desde [Drive](https://drive.google.com/drive/folders/14cO-4vOpz9Py0uEMDCC-yMhWo8rONps6?usp=sharing). Si no tiene instalado XAMPP, es necesario hacer la instalación
2. Descomprimir y copiar la carpetar en el directoria de Xampp
3. Importar la base de datos desde el archivo SQL proporcionado llamado Script.sql, usando phpMyAdmin
4. Inicie Apache y MySQL desde XAMPP

## Uso
1. Accede a http://localhost/pruebaVentaTenis-LunaOspina/index.php
2. Regístre un nuevo usuario o inicie sesión con los usarios ya registrados.
    - Admin: admin@admintenis.com / admin
    - Cliente: pepito@gmail.com / 1
3. Navege por el catálogo o gestione los productos.

## Estructura del Proyecto
- Vista
    - Archivos HTML y recursos estáticos
- Modelo
    - Acceso a datos y lógica de negocio, como gestores y clases
- Controlador
    - 	Lógica de control
- uploads
    - Imagenes utilizadas del proyecto
- index
    - Manejo de eventos en el proyecto
- README.md
    - Documentación del proyecto