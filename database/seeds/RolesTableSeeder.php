<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
        * 1
        */
       Role::create([
           'name' => 'user',
           'discription' => 'Пользователь'
       ]);
       
       /**
        * 2
        */
       Role::create([
           'name' => 'moderator',
           'discription' => 'Модератор'
       ]);
       
       /**
        * 3
        */
       Role::create([
           'name' => 'admin',
           'discription' => 'Администратор'
       ]);
       
       /**
        * 4
        */
       Role::create([
           'name' => 'superadmin',
           'discription' => 'Суперадминистратор'
       ]);
    }
}
