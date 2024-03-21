<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Interfaces\ProjectRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;

class ProjectController extends Controller
{
    use ApiResponseTrait;

    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $projects = $this->projectRepository->all();
        
        $formattedProjects = ProjectResource::collection($projects);
        return $this->successResponse(['data' => $formattedProjects]);
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $this->projectRepository->create([
            'name' => $request->title,
            'start_day' => Carbon::createFromFormat('Y-m-d', $request->startDate),
            'end_day' => Carbon::createFromFormat('Y-m-d', $request->endDate),
            'description' => $request->description,
        ]);

        return $this->successResponse(['message' => 'Data stored successfully'], 201);
    }
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }
    public function destroy(Project $project)
    {
        //
    }
}
