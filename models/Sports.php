<?php

namespace Controllers;

use models\Sport;

require_once '../models/Sport.php';
require_once __DIR__ . '/../functions/UrlHelper.php';

class SportController
{

    public function index()
    {
        $sportModel = new Sport();
        $sports = $sportModel->getAll();
        include '../views/sports/index.php';
    }


    public function show($id)
    {
        $sportModel = new Sport();
        $sport = $sportModel->getById($id);

        if ($sport) {
            include '../views/sports/show.php';
        } else {
            echo "Error: Sport not found.";
        }
    }


    public function create()
    {
        include '../views/sports/create.php';
    }


    public function store()
    {
        if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
            $sportModel = new Sport();
            $sportModel->name = trim($_POST['name']);

            if ($sportModel->create()) {
                header("Location: " . base_url() . "/sports");
                exit();
            } else {
                echo "Error: Unable to save sport.";
            }
        } else {
            echo "Error: Name is required.";
        }
    }


    public function edit($id)
    {
        $sportModel = new Sport();
        $sport = $sportModel->getById($id);

        if ($sport) {
            include '../views/sports/edit.php';
        } else {
            echo "Error: Sport not found.";
        }
    }


    public function update($id)
    {
        if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
            $sportModel = new Sport();
            $sportModel->id = $id;
            $sportModel->name = trim($_POST['name']);

            if ($sportModel->update()) {
                header("Location: " . base_url() . "/sports");
                exit();
            } else {
                echo "Error: Unable to update sport.";
            }
        } else {
            echo "Error: Name is required.";
        }
    }


    public function delete($id)
    {
        $sportModel = new Sport();
        $sportModel->id = $id;

        if ($sportModel->delete()) {
            header("Location: " . base_url() . "/sports");
            exit();
        } else {
            echo "Error: Unable to delete sport.";
        }
    }
}
?>