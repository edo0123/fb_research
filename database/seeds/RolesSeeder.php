<?php

namespace App\Modules\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [ 'name'  => 'administrator' ],
        ];

        //ამატებს როლებს, თუკი დამატებულია აღარ ამატებს.
        foreach($roles as $role) {
            if (!Role::where('name', $role['name'])->exists()) {
                Role::create($role);
            }
        }

        $allRoles = Role::all();

        $user = User::where('email', config('admin.admin_email'))->first();

        if (!is_null($user)) {

            // აბავს administrator როლს უკვე შექმნილ სატესტო მომხმარებელს.
            foreach($allRoles as $rl) {

                $rolName = $rl['name'];

                if(!$user->hasRole($rolName)) {
                    $user->assignRole($rolName);
                }

            }

        }

    }
}
