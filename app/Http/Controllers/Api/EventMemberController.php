<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventMemberResource;
use App\Models\EventMember;
use App\Services\EventMembersService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class EventMemberController extends Controller
{
    use HttpResponses;

    public function __construct(protected EventMembersService $eventMembersService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = $this->eventMembersService->index();

        return $this->success(EventMemberResource::collection($members));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventMember $eventMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventMember $eventMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventMember $eventMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventMember $eventMember)
    {
        //
    }
}
