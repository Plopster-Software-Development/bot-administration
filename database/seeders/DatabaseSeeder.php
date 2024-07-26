<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Tenant::factory(1)->create();
        User::factory(1)->create(['email' => 'nicolas.estevez@plopster.com.co']);
        Role::factory(1)->create();
        Permission::factory(5)->create();

        $user = User::first();
        $roles = Role::first();
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $roles->permissions()->attach($permission);
        }

        $user->roles()->attach($roles);
    }
}
