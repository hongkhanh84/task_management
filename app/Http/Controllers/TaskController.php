<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use ApiResponseTrait;


    public function index()
    {
        return Task::with('status')->get();
    }
    public function store(StoreTaskRequest $request)
    {
        $user = User::where('name', $request->assignee)->first();

        Task::create([
            'name' => $request->title,
            'description' => $request->description,
            'project_id' => $request->projectId,
            'end_date' => Carbon::createFromFormat('Y-m-d', $request->deadline),
            'assign_to' => $user->id,
            'status_id'=> $request->statuss,
        ]);   
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
