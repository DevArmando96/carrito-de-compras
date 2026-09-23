<?php

try {

    // Conexión
    require_once('../config/connection.php');

    $db = new Database();
    $con = $db->getConnection();

    // Obtener búsqueda
    $buscar = $_GET['buscar'] ?? '';

    $buscar = trim($buscar);

    // Consulta SQL
    $sql = "SELECT Nombre, Descripcion, Precio, Stock
            FROM productos
            WHERE Nombre LIKE :buscar
            ORDER BY id_producto DESC";

    // Preparar
    $stmt = $con->prepare($sql);

    // Preparar término
    $termino = "%$buscar%";

    // Bind con PDO
    $stmt->bindParam(':buscar', $termino, PDO::PARAM_STR);

    // Ejecutar
    $stmt->execute();

    // Recorrer resultados
    while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "
            <tr>
                <td>{$producto['Nombre']}</td>
                <td>{$producto['Descripcion']}</td>
                <td>{$producto['Precio']}</td>
                <td>{$producto['Stock']}</td>
            </tr>
        ";
    }

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}




?>