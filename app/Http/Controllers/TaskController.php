<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Interfaces\TaskRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use ApiResponseTrait;

    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }


    public function index()
    {
        //
    }
    public function store(StoreTaskRequest $request)
    {
        
    }
    public function show(Task $task)
    {
        //
    }
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    public function belong(Request $request)
    {
        //
    }
}
