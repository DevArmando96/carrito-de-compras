<?php

//incluye la conexion a la base
include(__DIR__ . '/../config/connection.php');

//conection a datbase
$connection  = new Database();
$pdo = $connection->getConnection();
// Parámetros de paginación
$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$por_pagina = 1;
$inicio = ($pagina > 1) ? ($pagina * $por_pagina - $por_pagina) : 0;

// Consulta con LIMIT y OFFSET
$stmt = $pdo->prepare("SELECT Nombre, Descripcion, Precio, Stock 
                       FROM productos 
                       LIMIT :inicio, :cantidad");

// Usamos bindValue para asegurar que sean tratados como enteros
$stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt->bindValue(':cantidad', $por_pagina, PDO::PARAM_INT);
$stmt->execute();

while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Descripcion']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Precio']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Stock']) . "</td>";
    // ... resto de celdas
    echo "</tr>";
}
