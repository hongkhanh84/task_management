<?php
namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all()
    {
        return Project::all();
    }

    public function create(array $data)
    {
        return Project::create($data);
    }
}