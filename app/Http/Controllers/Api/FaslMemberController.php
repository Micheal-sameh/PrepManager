<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaslMemberCreateRequest;
use App\Http\Requests\FaslMemberUpdateRequest;
use App\Http\Resources\FaslMembersResource;
use App\Models\FaslMember;
use App\Services\FaslMemberService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class FaslMemberController extends Controller
{
    use HttpResponses;

    public function __construct(protected FaslMemberService $faslMemberService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faslMembers = $this->faslMemberService->index();

        return $this->success(FaslMembersResource::collection($faslMembers));
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
    public function store(FaslMemberCreateRequest $request)
    {
        $member = $this->faslMemberService->store(...$request->only(
            'fasl_id', 'user_id', 'type'
        ));

        return $this->success(new FaslMembersResource($member));
    }

    /**
     * Display the specified resource.
     */
    public function show(FaslMember $faslMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaslMember $faslMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaslMemberUpdateRequest $request, FaslMember $id)
    {
        $member = $this->faslMemberService->update($id, ...$request->only(
            'fasl_id', 'type'
        ));

        return $this->success(new FaslMembersResource($member));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaslMember $faslMember)
    {
        //
    }
}
