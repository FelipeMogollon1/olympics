<?php

class Database {
    private $host = '3.85.233.186';
    private $db_name = 'olimpicos';
    private $username = 'admin1';
    private $password = 'L{@n<:c%Da,_';
    private $port = '5432';
    private $schema = 'equipo1';
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $this->conn->exec("SET search_path TO {$this->schema}");
        } catch (PDOException $exception) {
            error_log("Error de conexión: " . $exception->getMessage());
            echo "Ocurrió un error al conectar con la base de datos: " . $exception->getMessage();
        }
        return $this->conn;
    }

}
?>
