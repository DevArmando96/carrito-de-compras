<?php
// Desactivar visualización de errores de texto para no romper el JSON
ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');

try {
    require_once('../config/connection.php');

    $jsonInput = file_get_contents('php://input');
    $data = json_decode($jsonInput, true);

    if (!$data) {
        throw new Exception("Datos inválidos o vacíos.");
    }

    $db = new Database();
    $con = $db->getConnection();

    // Validar conexión
    if (!$con) {
        throw new Exception("No se pudo establecer la conexión con la base de datos.");
    }

    $sql = "INSERT INTO productos (Nombre, Descripcion, Precio, Stock, Categoria_id, Fecha_creacion, Activo) 
            VALUES (:nom, :des, :pre, :sto, :cat, :fec, :act)";

    $stmt = $con->prepare($sql);

    $stmt->execute([
        ':nom' => $data['nombre']      ?? null,
        ':des' => $data['descripcion'] ?? null,
        ':pre' => $data['precio']      ?? 0,
        ':sto' => $data['stock']       ?? 0,
        ':cat' => $data['categoria']   ?? null,
        ':fec' => $data['fecha']       ?? date("Y-m-d H:i:s"),
        ':act' => $data['activo']      ?? 1
    ]);

    echo json_encode([
        "status" => "success",
        "message" => "Producto registrado correctamente."
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "DB Error: " . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
