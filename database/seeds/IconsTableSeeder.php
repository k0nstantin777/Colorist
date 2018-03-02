<?php

use Illuminate\Database\Seeder;
use App\Models\Icon;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* --------------- Наши преимущества на главной ----------------*/  
        //1
        Icon::create([
            'icon' => '<i class="icon-scissors3"></i>', 
            'table_rel' => 'elements',
            'table_id' => 7,
            'sort' => 0
        ]);
        
        //2
        Icon::create([
            'icon' => '<i class="icon-scissors3"></i>', 
            'table_rel' => 'elements',
            'table_id' => 8,
            'sort' => 0
        ]);
        
        //3
        Icon::create([
            'icon' => '<i class="icon-scissors3"></i>', 
            'table_rel' => 'elements',
            'table_id' => 9,
            'sort' => 0
        ]);
        //4
        Icon::create([
            'icon' => '<i class="icon-scissors3"></i>', 
            'table_rel' => 'elements',
            'table_id' => 10,
            'sort' => 0
        ]);
    }
}
