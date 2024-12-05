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
        $users = $this->userRepository->index();
        $users->load('role');

        return $users;
    }

    public function store($input)
    {
        $user = $this->userRepository->store($input);
        $user->load('role');

        return $user;
    }

    public function update($input, $id)
    {
        $user = $this->userRepository->update();
        $user->load('role');

        return $user;
    }


    public function changePassword($password, $id)
    {
        $user = $this->userRepository->changePassword($password, $id);
        $user->load('role');

        return $user;
    }

    public function resetPassword($id)
    {
        $user = $this->userRepository->resetPassword($id);
        $user->load('role');

        return $user;
    }
}
