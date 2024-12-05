<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct(protected User $model)
    {

    }

    public function index()
    {
        //
    }

    public function store($input)
    {
        $user = $this->model->create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt('12345678'),
            'grad' => $input['grad'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'mother_name'=> $input['mother_name'],
            'father_name'=> $input['father_name'],
            'mother_phone' => $input['mother_phone'],
            'father_phone' => $input['father_phone'],
            // 'fasl' => $input['fasl'],
        ]);

        return $user;

    }
}
