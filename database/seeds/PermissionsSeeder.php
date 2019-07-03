<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // permission-ების ჩამონათვალის კონფიგი.
        $permissions = config('permission-list.permissions');

        // უვლის ყველა permission-ს/.
        foreach($permissions as $permission) {

            $permissionName = $permission['name'];

            //თუ დამატებულია უკვე permisison აღარ ამატებს.
            if (Permission::where('name', $permissionName)->exists()) continue;

            // იქმნება permission.
            $perm = Permission::create(['name'  => $permissionName]);

            // გადაუვლის ამ permission-თან მიბმულ როლებს და აბავს, თუკი მიბმულია, აღარ აბავს თავიდან.
            foreach($permission['roles'] as $rl) {

                $role = Role::where('name', $rl)->first();

                if (is_null($role)) continue;

                if ( ! $role->hasPermissionTo($permissionName) ) {
                    $perm->assignRole($rl);
                }

            }


        }


    }
}
