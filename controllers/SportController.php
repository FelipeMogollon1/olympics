<?php

namespace controllers;

use models\Sport;

require_once '../models/Sport.php';
require_once __DIR__ . '/../functions/UrlHelper.php';

class SportController
{
    private $sportModel;

    public function __construct()
    {
        $this->sportModel = new Sport();
    }

       public function index()
    {
        $sports = $this->sportModel->getAll();
        include __DIR__ . '/../views/sports/index.php';
    }

    public function show($id)
    {
        $sport = $this->sportModel->getById($id);

        if ($sport) {
            include '../views/sports/Show.php';
        } else {
            echo "Error: Sport not found.";
        }
    }

    public function create()
    {
        include __DIR__ . '/../views/sports/create.php';
    }


    public function store()
    {
        $this->sportModel->name = $_POST['name'];
        $this->sportModel->create();
        header("Location: " . base_url() . "/sports");
    }


    public function edit($id)
    {
        $sport = $this->sportModel->getById($id);
        include __DIR__ . '/../views/sports/edit.php';
    }


    public function update($id)
    {
        $this->sportModel->id = $id;
        $this->sportModel->name = $_POST['name'];
        $this->sportModel->update();
        header("Location: " . base_url() . "/sports");
    }


    public function delete($id)
    {
        $this->sportModel->id = $id;
        $this->sportModel->delete();
        header("Location: " . base_url() . "/sports");
    }
}
?>
