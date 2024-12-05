<?php


namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRepository
{
    public function __construct(protected User $model)
    {

    }

    public function index()
    {
        return $this->model->all();
    }

    public function store($input)
    {
        $role_id = (!is_null($input->role_id)) ? $input->role_id : Role::where('name', 'user')->first()->id;
        $user = $this->model->create([
            'name' => $input->name,
            'email' => $input->email,
            'password' => bcrypt('12345678'),
            'grad' => $input->grad,
            'role_id' => $role_id,
            'phone' => $input->phone,
            'address' => $input->address,
            'mother_name'=> $input->motherName,
            'father_name'=> $input->fatherName,
            'mother_phone' => $input->motherPhone,
            'father_phone' => $input->fatherPhone,
            // 'fasl' => $input['fasl'],
        ]);
        $user->assignRole($role_id);

        return $user;

    }
}
