<?php

namespace Controllers;

use models\Judge;

require_once '../models/Judge.php';
require_once __DIR__ . '/../functions/UrlHelper.php';

class JudgeController
{

    public function index()
    {
        $judgeModel = new Judge();
        $judges = $judgeModel->getAll();
        include '../views/judges/index.php';
    }

    public function show($id)
    {
        $judgeModel = new Judge();
        $judge = $judgeModel->getById($id);

        if ($judge) {
            include '../views/judges/show.php';
        } else {
            echo "Error: Judge not found.";
        }
    }


    public function create()
    {
        include '../views/judges/create.php';
    }


    public function store()
    {
        if (
            isset($_POST['certification'], $_POST['experienceYears'], $_POST['id_sport'], $_POST['id_person'], $_POST['id_country'])
            && !empty(trim($_POST['certification']))
            && is_numeric($_POST['experienceYears'])
        ) {
            $judgeModel = new Judge();
            $judgeModel->certification = trim($_POST['certification']);
            $judgeModel->experienceYears = (int) $_POST['experienceYears'];
            $judgeModel->id_sport = (int) $_POST['id_sport'];
            $judgeModel->id_person = (int) $_POST['id_person'];
            $judgeModel->id_country = (int) $_POST['id_country'];

            if ($judgeModel->create()) {
                header("Location: " . base_url() . "/judges");
                exit();
            } else {
                echo "Error: Unable to save judge.";
            }
        } else {
            echo "Error: All fields are required and must be valid.";
        }
    }


    public function edit($id)
    {
        $judgeModel = new Judge();
        $judge = $judgeModel->getById($id);

        if ($judge) {
            include '../views/judges/edit.php';
        } else {
            echo "Error: Judge not found.";
        }
    }


    public function update($id)
    {
        if (
            isset($_POST['certification'], $_POST['experienceYears'], $_POST['id_sport'], $_POST['id_person'], $_POST['id_country'])
            && !empty(trim($_POST['certification']))
            && is_numeric($_POST['experienceYears'])
        ) {
            $judgeModel = new Judge();
            $judgeModel->id = $id;
            $judgeModel->certification = trim($_POST['certification']);
            $judgeModel->experienceYears = (int) $_POST['experienceYears'];
            $judgeModel->id_sport = (int) $_POST['id_sport'];
            $judgeModel->id_person = (int) $_POST['id_person'];
            $judgeModel->id_country = (int) $_POST['id_country'];

            if ($judgeModel->update()) {
                header("Location: " . base_url() . "/judges");
                exit();
            } else {
                echo "Error: Unable to update judge.";
            }
        } else {
            echo "Error: All fields are required and must be valid.";
        }
    }


    public function delete($id)
    {
        $judgeModel = new Judge();
        $judgeModel->id = $id;

        if ($judgeModel->delete()) {
            header("Location: " . base_url() . "/judges");
            exit();
        } else {
            echo "Error: Unable to delete judge.";
        }
    }
}
