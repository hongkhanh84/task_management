<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
         // Create a new instance of your model
         $data = new Project(); // Replace data with your actual model name

         // Assign the validated data to the model properties
         $data->name = $request['title'];
         $data->start_date = $request['startDate'];
         $data->end_date = $request['endDate'];
         $data->description = $request['description'];
         // Assign other fields as needed
 
         // Save the model instance to the database
         $data->save();
 
         // Optionally, you can return a response indicating success
         return response()->json(['message' => 'Data stored successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        //
    }
}
