<?php

namespace models;

require_once '../config/database.php';

class Country
{
    private $conn;
    private $table = 'pais';

    public $id;
    public $name;
    public $continent;

    public function __construct()
    {
        $database = new \Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Obtener todos los registros de la tabla pais.
     * @return array|false
     */
    public function getAll()
    {
        $query = "
            SELECT id_pais AS id, nombre AS name, continente AS continent
            FROM " . $this->table . "
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Obtener un registro de pais por su ID.
     * @param int $id
     * @return object|false
     */
    public function getById($id)
    {
        $query = "
            SELECT id_pais AS id, nombre AS name, continente AS continent
            FROM " . $this->table . "
            WHERE id_pais = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Crear un nuevo país en la base de datos.
     * @return bool
     */
    public function create()
    {
        $query = "
            INSERT INTO " . $this->table . " (nombre, continente)
            VALUES (?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->name,
            $this->continent
        ]);
    }

    /**
     * Actualizar un país existente.
     * @return bool
     */
    public function update()
    {
        $query = "
            UPDATE " . $this->table . "
            SET nombre = ?, continente = ?
            WHERE id_pais = ?
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->name,
            $this->continent,
            $this->id
        ]);
    }

    /**
     * Eliminar un país por su ID.
     * @return bool
     */
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_pais = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }
}
?>
