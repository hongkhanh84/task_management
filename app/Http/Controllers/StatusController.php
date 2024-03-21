<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\StatusResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class StatusController extends Controller
{
    use ApiResponseTrait;

    public function all()
    {
        $data = Status::all();
        return $this->successResponse(StatusResource::collection($data));
    }
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
    public function store(StoreStatusRequest $request)
    {
        Status::create([
            'status_name' => $request->name,
            'description' => $request->description,
        ]);   
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status): RedirectResponse
    {
        //
    }
}
