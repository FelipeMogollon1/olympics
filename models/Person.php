<?php

namespace models;

require_once '../config/database.php';

class Person
{
    private $conn;
    private $table = 'persona';

    public $id;
    public $firstName;
    public $lastName;
    public $gender;
    public $birthdate;
    public $countryId;

    public function __construct()
    {
        $database = new \Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "
        SELECT
            p.id_persona,
            p.nombre AS firstName,
            p.apellido AS lastName,
            p.genero AS gender,
            p.fecha_nacimiento AS birthdate,
            pais.nombre AS countryName,
            pais.continente AS continent
        FROM " . $this->table . " AS p
        INNER JOIN pais ON pais.id_pais = p.id_pais
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function getById($id)
    {
        $query = "
        SELECT
            p.id_persona,
            p.nombre AS firstName,
            p.apellido AS lastName,
            CONCAT(p.nombre, ' ', p.apellido) AS fullName,
            p.genero AS gender,
            EXTRACT(YEAR FROM AGE(CURRENT_DATE, p.fecha_nacimiento)) AS age,
            p.fecha_nacimiento AS birthdate,
            pais.nombre AS countryName,
            pais.id_pais AS countryId
        FROM " . $this->table . " AS p
        INNER JOIN pais ON pais.id_pais = p.id_pais
        WHERE p.id_persona = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }


    public function create()
    {
        $query = "
            INSERT INTO " . $this->table . " (nombre, apellido, genero, fecha_nacimiento, id_pais)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->firstName,
            $this->lastName,
            $this->gender,
            $this->birthdate,
            $this->countryId,
        ]);
    }


    public function update()
    {
        $query = "
            UPDATE " . $this->table . "
            SET nombre = ?, apellido = ?, genero = ?, fecha_nacimiento = ?, id_pais = ?
            WHERE id_persona = ?
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->firstName,
            $this->lastName,
            $this->gender,
            $this->birthdate,
            $this->countryId,
            $this->id,
        ]);
    }


    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_persona = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }
}
