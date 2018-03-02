<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
           'name' => 'Новая', 
        ]);
        
        Status::create([
           'name' => 'В работе', 
        ]);
        
        Status::create([
           'name' => 'Выполнена', 
        ]);
        
        Status::create([
           'name' => 'Отклонена', 
        ]);
    }
}
