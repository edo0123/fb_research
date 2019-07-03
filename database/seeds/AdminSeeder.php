<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $administrator = [
            'name' => 'Administrator',
            'email' => config('admin.admin_email'),
            'password' => config('admin.admin_password'),
        ];

        $user = new User();
        $user->create($administrator);
    }
}
