<?php

namespace MVC\Models;

use MVC\Core\ResourceModel;
use MVC\Models\TaskModel;

class TaskResourceModel extends ResourceModel
{

    /**
     * TaskResourceModel constructor.
     */
    public function __construct()
    {
        $this->_init('tasks', 'taskId', new TaskModel);
    }
}