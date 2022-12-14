<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Services\StatusService;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        return [
            'statuses' => StatusService::index($request->user()),
            'meta' => [
                'count' => StatusService::count($request->user()),
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return Status
     */
    public function store(Request $request): Status
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:6',
        ]);
        return StatusService::create($request->user(), $validatedData);
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @param Status $status
     * @return Status
     * @throws \Exception
     */
    public function show(Request $request, Status $status): Status
    {
        return StatusService::show($status);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param  Status  $status
     * @return Status
     */
    public function update(Request $request, Status $status): Status
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:6',
        ]);

        return StatusService::update($status, $validatedData);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Status  $status
     * @return void
     */
    public function destroy(Status $status): void
    {
        StatusService::delete($status);
    }
}
