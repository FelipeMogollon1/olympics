<?php

namespace controllers;

use models\Sport;

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
        include __DIR__ . '/../views/sport/index.php';
    }


    public function create()
    {
        include __DIR__ . '/../views/sport/create.php';
    }


    public function store()
    {
        $this->sportModel->name = $_POST['name'];
        $this->sportModel->create();
        header('Location: /sports');
    }


    public function edit($id)
    {
        $sport = $this->sportModel->getById($id);
        include __DIR__ . '/../views/sport/edit.php';
    }


    public function update($id)
    {
        $this->sportModel->id = $id;
        $this->sportModel->name = $_POST['name'];
        $this->sportModel->update();
        header('Location: /sports');
    }


    public function delete($id)
    {
        $this->sportModel->id = $id;
        $this->sportModel->delete();
        header('Location: /sports');
    }
}
?>
