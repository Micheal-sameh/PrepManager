<?php


namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make('avarewase'),
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

    public function update($input, $id)
    {
        $user = $this->model->find($id);
        $role_id = (!is_null($input->role_id)) ? $input->role_id : $user->role_id;
        $user->update([
            'name' => $input->name ?? $user->name,
            'email' => $input->email ?? $user->email,
            'grad' => $input->grad ?? $user->grad,
            'role_id' => $role_id ?? $user->role_id,
            'phone' => $input->phone ?? $user->phone,
            'address' => $input->address ?? $user->address,
            'mother_name'=> $input->motherName ?? $user->motherName,
            'father_name'=> $input->fatherName ?? $user->fatherName,
            'mother_phone' => $input->motherPhone ?? $user->motherPhone,
            'father_phone' => $input->fatherPhone ?? $user->fatherPhone,
            // 'fasl' => $input['fasl'] ?? $user->fasl,
        ]);

        return $user;
    }

    public function changePassword($password, $id)
    {
        $user = $this->model->find($id);
        $user->update([
            'password' => Hash::make($password),
        ]);
        return $user;
    }

    public function resetPassword($id)
    {
        $user = $this->model->find($id);
        $user->update([
            'password' => Hash::make('avarewase'),
        ]);

        return $user;
    }
}
