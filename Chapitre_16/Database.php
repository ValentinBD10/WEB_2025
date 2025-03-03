<?php
class Database {
    private static $instance = null;
    private $connection;

    // Constructeur privé pour empêcher la création d'instances
    private function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "crud_db");

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Méthode pour obtenir l'instance de la connexion
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Méthode pour obtenir la connexion
    public function getConnection() {
        return $this->connection;
    }
}
?>
