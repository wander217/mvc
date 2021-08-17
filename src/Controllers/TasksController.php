<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;

class TasksController extends Controller
{
    function index()
    {
        $task_repository = new TaskRepository;

        $d['tasks'] = $task_repository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $task_repository = new TaskRepository;
            $task_model = new TaskModel;
            $task_model->setTitle($_POST['title']);
            $task_model->setDescription($_POST['description']);

            if ($task_repository->add($task_model)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task_repository = new TaskRepository;
        $old_model = $task_repository->get($id);
        $d["tasks"] = $old_model->getProperties();

        if (isset($_POST["title"])) {
            $model = new TaskModel;
            $model->setId($id);
            $model->setTitle($_POST['title']);
            $model->setDescription($_POST['description']);
            if ($task_repository->add($model)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task_repository = new TaskRepository;

        if ($task_repository->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}