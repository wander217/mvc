<?php

namespace MVC\Core;

interface ResourceModelInterface
{
    public function _init($table, $id, $model);

    public function save($model);

    public function delete($id);
}