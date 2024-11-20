<?php

namespace models;

require_once '../config/database.php';

class Sport
{
    private $conn;
    private $table = 'deporte';

      public $id;
    public $name;

    public function __construct()
    {
        $database = new \Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Obtener todos los registros de la tabla deporte.
     * @return array|false
     */
    public function getAll()
    {
        $query = "
            SELECT id_deporte AS id, nombre AS name
            FROM " . $this->table . "
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Obtener un registro de deporte por su ID.
     * @param int $id
     * @return object|false
     */
    public function getById($id)
    {
        $query = "
            SELECT id_deporte AS id, nombre AS name
            FROM " . $this->table . "
            WHERE id_deporte = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Crear un nuevo deporte en la base de datos.
     * @return bool
     */
    public function create()
    {
        $query = "
            INSERT INTO " . $this->table . " (nombre)
            VALUES (?)
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->name]);
    }

    /**
     * Actualizar un deporte existente.
     * @return bool
     */
    public function update()
    {
        $query = "
            UPDATE " . $this->table . "
            SET nombre = ?
            WHERE id_deporte = ?
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->name,
            $this->id
        ]);
    }

    /**
     * Eliminar un deporte por su ID.
     * @return bool
     */
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_deporte = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }
}
?>