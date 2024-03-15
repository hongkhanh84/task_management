<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::all();

        // Extracting required fields from each project
        $formattedData = $data->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->name,
                'description' => $project->description,
                'startday' => $project->start_day,
                'endday' => $project->end_day,
                'status' => $project->status,
            ];
        });

    return response()->json([
        'data' => $formattedData,
    ]);
    }

    public function store(StoreProjectRequest $request)
    {
         $data = new Project();
         $data->name = $request['title'];
         $data->start_day = Carbon::createFromFormat('Y-m-d', $request['startDate']);
         $data->end_day = Carbon::createFromFormat('Y-m-d', $request['endDate']);
         $data->description = $request['description'];
         $data->save();
 
         return response()->json(['message' => 'Data stored successfully'], 201);
    }
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        //
    }
    public function destroy(Project $project): RedirectResponse
    {
        //
    }
}
