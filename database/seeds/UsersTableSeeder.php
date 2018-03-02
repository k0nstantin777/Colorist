<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'bumer110685@yandex.ru',
            'password' => bcrypt('qwerty'),
            'role_id' => 3
        ]);
        
        User::create([
            'name' => 'superadmin',
            'email' => 'noskov.kos@gmail.com',
            'password' => bcrypt('0a02a02a0!'),
            'role_id' => 4
        ]);
    }
}
