<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;
use Carbon\Carbon;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Profile::create([
            'first_name' => 'Константин',
            'last_name' => 'Носков',
            'age' => 32,
            'birthdate' => Carbon::create('1985','06', '11')->toDateTimeString(),
            'phone' => '8-922-163-01-50',
            'sex'=> 'мужской',
            'user_id' => 1,
            
        ]);
        
        //2
        Profile::create([
            'first_name' => 'Konstantin',
            'last_name' => 'Noskov',
            'age' => 32,
            'birthdate' => Carbon::create('1985','06', '11')->toDateTimeString(),
            'phone' => '8-922-163-01-50',
            'sex'=> 'male',
            'user_id' => 2,
            
        ]);
    }
}
