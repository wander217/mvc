<?php

namespace MVC\Core;

use MVC\Config\Database;
use MVC\Core\ResourceModelInterface;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $arrayModel = $model->getProperties();

        $keyQuery = [];
        $keys = array_keys($arrayModel);
        foreach ($keys as $key) {
            array_push($keyQuery, $key . ' = :' . $key);
        }

        $id = $model->getId();
        if ($id === null) {
            $query = 'INSERT INTO ' . $this->table . ' SET ' . implode(',', $keyQuery);
        } else {
            $query = 'UPDATE ' . $this->table . ' SET ' . implode(',', $keyQuery) . ' WHERE id= ' . $id;
        }
        $request = Database::getConnection()->prepare($query);
        return $request->execute($arrayModel);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $request = Database::getConnection()->prepare($query);
        $request->bindParam(1, $id);
        return $request->execute();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $request = Database::getConnection()->prepare($query);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_CLASS, get_class($this->model));
    }

    public function get($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $request = Database::getConnection()->prepare($query);
        $request->bindParam(1, $id);
        $request->execute();
        return $request->fetchObject(get_class($this->model));
    }
}