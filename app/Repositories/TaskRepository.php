<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function all()
    {
        return Task::all();
    }
}
