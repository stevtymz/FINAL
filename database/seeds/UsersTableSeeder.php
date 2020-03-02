<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$QGBYRyEah7vni8rou1w9Ru/jqBQ1ZjNBuibhaLVL.03AIidx3wjgm',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
