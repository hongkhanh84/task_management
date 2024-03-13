<?php

namespace App\Http\Controllers;

use App\Models\Project_User;
use App\Http\Requests\StoreProject_UserRequest;
use App\Http\Requests\UpdateProject_UserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProjectUserController extends Controller
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
    public function store(StoreProject_UserRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project_User $project_User): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project_User $project_User): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProject_UserRequest $request, Project_User $project_User): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project_User $project_User): RedirectResponse
    {
        //
    }
}
