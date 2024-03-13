<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Http\Requests\StoreSubtaskRequest;
use App\Http\Requests\UpdateSubtaskRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class SubtaskController extends Controller
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
    public function store(StoreSubtaskRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subtask $subtask): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subtask $subtask): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubtaskRequest $request, Subtask $subtask): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subtask $subtask): RedirectResponse
    {
        //
    }
}
