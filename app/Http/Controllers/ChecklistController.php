<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChecklistRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Checklist;
use Illuminate\Http\JsonResponse;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $checklists = Checklist::all();
        
        return ApiResponse::success($checklists, 'Lista de todos los checklist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChecklistRequest $request): JsonResponse
    {
        $data = $request->validated();

        $checklist = Checklist::create($data);

        return ApiResponse::success($checklist, 'Checklist creado correctamente', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Checklist $checklist): JsonResponse
    {
        return ApiResponse::success($checklist, 'Checklist ' . $checklist->id . ' mostrado correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Checklist $checklist, StoreChecklistRequest $request): JsonResponse
    {
        $data = $request->validated();

        $checklist->fill($data);

        return ApiResponse::success($checklist, 'Checklist ' . $checklist->id . ' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist): JsonResponse
    {
        $checklist->delete();
        
        return ApiResponse::success([], 'Checklist ' . $checklist->id . ' eliminada correctamente');
    }
}
