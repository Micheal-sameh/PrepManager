<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCategoryCreateRequest;
use App\Http\Resources\EventCategoryResource;
use App\Models\EventCategory;
use App\Services\EventCategoryService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    use HttpResponses;

    public function __construct(protected EventCategoryService $eventCategoryService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->eventCategoryService->index();

        return $this->success(EventCategoryResource::collection($categories));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventCategoryCreateRequest $request)
    {
        $category = $this->eventCategoryService->store(...$request->only('name', 'description'));

        return $this->success(new EventCategoryResource($category));
    }

    /**
     * Display the specified resource.
     */
    public function show(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventCategory $category)
    {
        $category = $this->eventCategoryService->update($category, ...$request->only('name', 'description'));
        $category->load('createdBy');

        return $this->success(new EventCategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventCategory $eventCategory)
    {
        //
    }
}
