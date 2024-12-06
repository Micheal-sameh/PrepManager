<?php

namespace Database\Seeders;

use App\Enums\Grads;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::find(1);
        $user = User::create([
            'name' => 'micheal',
            'email' => 'misho@admin.com',
            'password' => Hash::make('123456'),
            'role_id' => $role->id,
            'phone' => '01278783887',
            'grad' =>  Grads::PREPARATORY_THREE,
            // 'status' => 'active'
        ]);
        // $role = Role::create(['name' => 'owner']);
        // $permissions = Permission::pluck('id', 'id')->all();
        // $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
