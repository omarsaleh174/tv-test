<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    public function run()
    {

        $user = User::updateOrCreate([
            'email'=>'admin@admin.com',
        ],[
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>'12345678',
            'type'=>1,

        ]);
        $role = Role::where('name','admin')->first();
        $user->assignRole($role);
    }
}
