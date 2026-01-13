<?php

//conección a la base de datos 
class Database {
    private $host = 'localhost';
    private $db   = 'carrito';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $port = '3307';
    private $pdo;


    
    public function __construct() {
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db};charset={$this->charset}";
        $options = [
            // Lanzar excepciones
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            // Obtener resultados como array asociativo
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            //realiza consultas preparasas nativas 
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            die("Error de conexión a la base de datos");
        }
    }

    // Método para obtener la instancia de PDO
    public function getConnection() {
        return $this->pdo;
    }
}


?>