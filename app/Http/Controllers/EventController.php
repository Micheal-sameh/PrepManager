<?php

namespace App\Http\Controllers;

use App\DTOs\EventCreateDTO;
use App\Http\Requests\EventCreateRequest;
use App\Http\Resources\EventResource;
use App\Models\EventCategory;
use App\Services\EventService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use HttpResponses;

    public function __construct(protected EventService $eventService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = $this->eventService->index();

        return $this->success(EventResource::collection($events));
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
    public function store(EventCreateRequest $request)
    {
        $input = new EventCreateDTO(...$request->only(
            'name', 'description', 'goal', 'location', 'bonus_1', 'bonus_2', 'bonus_3'
        ));
        $event = $this->eventService->store($input);

        return $this->success(new EventResource($event));
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
    public function update(Request $request, EventCategory $eventCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventCategory $eventCategory)
    {
        //
    }
}
