<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        //
    }
    public function store(StoreTaskRequest $request)
    {
        //
    }
    public function show(Task $task)
    {
        //
    }
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }
}
