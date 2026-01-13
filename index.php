<?php
//añade el modal para registrara el prodcuto
include 'addproducto.php';
//añade la conexion a la base de datos
require_once __DIR__ . '/config/connection.php';

$connection  = new Database();
$pdo = $connection->getConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <!--instalar bootstrap--->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!--diseño css---->
     <link rel="stylesheet" href="css/style.css">
     <!--linkear jqueery--->
    <script src="jquery/jquery-3.7.1.min.js"></script>
     <!--linkea script de js-->

</head>

<body>


     <!--abre boton para agregar producto--->
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproducto">Agregar Producto 🛒
     </button>











     <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<!--añade el script de la carpeta js-->
     <script src="js/addproducto.js"></script>
</body>

</html>