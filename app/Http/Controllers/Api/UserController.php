<?php

namespace App\Http\Controllers\Api;

use App\DTOs\UserCreateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use HttpResponses;

    public function __construct(protected UserService $userService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->index();
        return $this->success(UserResource::collection($users));
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
    public function store(UserCreateRequest $request)
    {
        $input = new UserCreateDTO(...$request->only(
            'name', 'phone', 'email', 'grad', 'fasl', 'role_id', 'mother_name', 'mother_phone', 'father_name',
            'father_phone', 'address'
        ));
        $user = $this->userService->store($input);

        return $this->success($user, 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
