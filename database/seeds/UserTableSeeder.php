<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'administrator',
            'username' => 'administrator',
            'password' => 'user',
            'role_id' => 1
        ]);

        App\User::create([
            'name' => 'user',
            'username' => 'user',
            'password' => 'user',
            'role_id' => 2
        ]);

        App\User::create([
            'name' => 'kelurahan',
            'username' => 'kelurahan',
            'password' => 'user',
            'role_id' => 1
        ]);

        App\User::create([
            'name' => 'sekertaris kelurahan',
            'username' => 'sekertaris',
            'password' => 'user',
            'role_id' => 1
        ]);
    }
}
