<?php

namespace models;

require_once '../config/database.php';

class Judge
{
    private $conn;
    private $table = 'juez';

    public $id;
    public $certification;
    public $experienceYears;
    public $id_sport;
    public $id_person;
    public $id_country;

    public function __construct()
    {
        $database = new \Database();
        $this->conn = $database->getConnection();
    }


    public function getAll() {
        $query = "
        SELECT  
            j.id_juez AS id,
            p.nombre AS firstName,
            p.apellido AS lastName,
            d.nombre AS sport,
            j.certificacion AS certification,
            j.experiencia_anios AS experienceYears
        FROM " . $this->table . " AS j
        INNER JOIN deporte AS d ON d.id_deporte = j.id_deporte
        INNER JOIN persona AS p ON p.id_persona = j.id_persona
        INNER JOIN pais AS p2 ON p2.id_pais = j.id_pais
    ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(\PDO::FETCH_OBJ);
     //  print_r($results);
        return $results;
    }


    public function getById($id)
    {
        $query = "
        SELECT
            j.id_juez AS id,
            p.id_persona AS id_persona,
            CONCAT(p.nombre, ' ', p.apellido) AS fullName,
            EXTRACT(YEAR FROM AGE(CURRENT_DATE, p.fecha_nacimiento)) AS edad,
            d.nombre AS sport,
            j.certificacion AS certification,
            j.experiencia_anios AS experienceYears,
            p2.nombre AS country,
            p2.continente AS continent,
            j.id_deporte AS sport_id,
            j.id_pais AS country_id
        FROM " . $this->table . " AS j
        INNER JOIN deporte AS d ON d.id_deporte = j.id_deporte
        INNER JOIN persona AS p ON p.id_persona = j.id_persona
        INNER JOIN pais AS p2 ON p2.id_pais = j.id_pais
        WHERE j.id_juez = ?
    ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }



    public function create()
    {
        $query = "
            INSERT INTO " . $this->table . " (certificacion, experiencia_anios, id_deporte, id_persona, id_pais)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->certification,
            $this->experienceYears,
            $this->id_sport,
            $this->id_person,
            $this->id_country,
        ]);
    }


    public function update()
    {
        $query = "
            UPDATE " . $this->table . "
            SET certificacion = ?, experiencia_anios = ?, id_deporte = ?, id_persona = ?, id_pais = ?
            WHERE id_juez = ?
        ";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->certification,
            $this->experienceYears,
            $this->id_sport,
            $this->id_person,
            $this->id_country,
            $this->id,
        ]);
    }


    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_juez = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }
}
