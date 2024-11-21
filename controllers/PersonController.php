<?php

namespace controllers;

use models\Person;

require_once '../models/Person.php';
require_once __DIR__ . '/../functions/UrlHelper.php';

class PersonController
{
    private $personModel;

    public function __construct()
    {
        $this->personModel = new Person();
    }

    public function index()
    {
        $people = $this->personModel->getAll();
        include __DIR__ . '/../views/people/index.php';
    }

    public function show($id)
    {
        $person = $this->personModel->getById($id);

        if ($person) {
            include __DIR__ . '/../views/people/show.php';
        } else {
            echo "Error: Person not found.";
        }
    }

    public function create()
    {
        include __DIR__ . '/../views/people/create.php';
    }

    public function store()
    {
        $this->personModel->firstName = $_POST['firstName'];
        $this->personModel->lastName = $_POST['lastName'];
        $this->personModel->gender = $_POST['gender'];
        $this->personModel->birthdate = $_POST['birthdate'];
        $this->personModel->countryId = $_POST['countryId'];

        $this->personModel->create();
        header("Location: " . base_url() . "/people");
    }

    public function edit($id)
    {
        $person = $this->personModel->getById($id);
        include __DIR__ . '/../views/people/edit.php';
    }

    public function update($id)
    {
        $this->personModel->id = $id;
        $this->personModel->firstName = $_POST['firstName'];
        $this->personModel->lastName = $_POST['lastName'];
        $this->personModel->gender = $_POST['gender'];
        $this->personModel->birthdate = $_POST['birthdate'];
        $this->personModel->countryId = $_POST['countryId'];

        $this->personModel->update();
        header("Location: " . base_url() . "/people");
    }

    public function delete($id)
    {
        $this->personModel->id = $id;
        $this->personModel->delete();
        header("Location: " . base_url() . "/people");
    }
}
?>