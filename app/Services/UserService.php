<?php


namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {

    }
    public function index()
    {
        //
    }

    public function store($input)
    {
        $user = $this->userRepository->store($input);

        return $user;
    }
}
