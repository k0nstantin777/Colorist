<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Prive;

class PriveRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //All rigths, except superuser
        $roles = Prive::where('id', '>', 1)->pluck('id');
        Role::find(3)->prives()->attach($roles);
        
        Role::find(4)->prives()->attach([1]);
    }
}
