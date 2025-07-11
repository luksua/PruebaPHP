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

## Tareas realizadas del reto avanzado

- [x] Adaptar la base de datos -> **Angel**
- [x] Cambios en las vistas: Catalogo -> **Luna**
- [x] Cambios en las vistas: Panel Administrador -> **Angel**

### Opcional
- [x] Carrito de compras mixto -> **Luna**
- [ ] Estadísticas de productos más vendidos por tipo -> **Bryan**
- [x] Filtro avanzado por tipo, marca o características -> **Luna**
- [x] Backend que gestione múltiples imágenes por producto (subida, eliminación y visualización) -> **Angel**

### Autenticación completa y segura
- [x] Implementar login y registro para clientes -> **Luna**
- [x] Guardar contraseñas con hash (`password_hash` / `password_verify`) -> **Luna**
- [x] Controlar acceso mediante sesiones para la zona admin -> **Angel**

### Paginación y búsqueda
- [x] Mostrar productos en el catálogo en páginas de 6, 9 o 12 productos -> **Luna**
- [x] Añadir buscador por nombre o filtro por categoría -> **Luna**

### Carrito de compras (simulado)
- [x] Permitir que el cliente agregue varios productos antes de confirmar el pedido -> **Luna**
- [x] Guardar el carrito en la sesión y luego crear el pedido al confirmar -> **Luna**

### Estado del pedido
- [x] Permitir que el administrador cambie el estado de un pedido (Pendiente, Enviado, Entregado, Cancelado) -> **Luna**
- [x] Mostrar al cliente el estado actual de sus pedidos -> **Luna**

### Dashboard con gráficas
- [ ] Mostrar en el panel admin estadísticas básicas usando Chart.js o similar -> **Bryan**
    - Ejemplo: número de pedidos por mes, productos más vendidos, etc