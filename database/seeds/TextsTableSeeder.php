<?php

use Illuminate\Database\Seeder;
use App\Model\Text;

class TextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *      $table->text('text')->nullable();
     *      $table->string('table_rel', 255)->default('elements');
     *      $table->integer('table_id')->unsigned();
     *      $table->integer('sort')->default(0);
     *
     * @return void
     */
    public function run()
    {
        
        /* ---------------Слайдер на главной ----------------*/
        //1
        Text::create([
            'text' => 'Добро пожаловать в наш салон!', 
            'table_rel' => 'blocks',
            'table_id' => 1,
            'sort' => 0
        ]);
        
        //2
        Text::create([
            'text' => 'Мы создаем красоту и успех!', 
            'table_rel' => 'blocks',
            'table_id' => 1,
            'sort' => 1
        ]);
        
        //3
        Text::create([
            'text' => 'Мы сделаем вас блистательными!', 
            'table_rel' => 'blocks',
            'table_id' => 1,
            'sort' => 2
        ]);
        
        /* --------------- Приветственный текст на главной ----------------*/

        //4
        Text::create([
            'text' => '<p>Здесь нужно написать приветственный текст. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid dolorum saepe magnam natus perferendis corrupti tenetur quidem suscipit eaque blanditiis corporis veniam molestias qui culpa veritatis officiis eum. Doloribus quos minus quas reprehenderit! Ad provident sunt totam culpa tenetur? Libero maxime molestiae cumque excepturi. </p>
                       <p>Eveniet tempora a nisi aut debitis! Recusandae dolores vero autem expedita nihil asperiores maxime modi ducimus nemo dicta nulla dolore? Inventore necessitatibus non laboriosam eos quod dignissimos soluta sunt id fugiat debitis nam omnis? A ullam minima excepturi nulla totam necessitatibus illum modi exercitationem blanditiis quaerat at fugit ad eveniet ipsum error quod sit cumque impedit!</p>', 
            'table_rel' => 'elements',
            'table_id' => 1,
            'sort' => 0
        ]);
        
        /* --------------- Наши услуги на главной ----------------*/
        //5
        Text::create([
            'text' => '<p>Описание услуги. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 2,
            'sort' => 0
        ]);
        
        //6
        Text::create([
            'text' => '<p>Описание услуги. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 3,
            'sort' => 0
        ]);
        
        //7
        Text::create([
            'text' => '<p>Описание услуги. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 4,
            'sort' => 0
        ]);
        
        //8
        Text::create([
            'text' => '<p>Описание услуги. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 5,
            'sort' => 0
        ]);
        
        /* --------------- Наши преимущества на главной ----------------*/        
        //9
        Text::create([
            'text' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 7,
            'sort' => 0
        ]);
        
        //10
        Text::create([
            'text' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 8,
            'sort' => 0
        ]);
        
        //11
        Text::create([
            'text' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 9,
            'sort' => 0
        ]);
        
        //12
        Text::create([
            'text' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>', 
            'table_rel' => 'elements',
            'table_id' => 10,
            'sort' => 0
        ]);

        /* --------------- Прайс-лист на главной ----------------*/
        //13
        Text::create([
            'text' => 'Мужская стрижка',
            'table_rel' => 'elements',
            'table_id' => 12,
            'sort' => 0
        ]);

        //14
        Text::create([
            'text' => '1000 руб.',
            'table_rel' => 'elements',
            'table_id' => 12,
            'sort' => 1
        ]);

        //15
        Text::create([
            'text' => 'Женская стрижка',
            'table_rel' => 'elements',
            'table_id' => 12,
            'sort' => 2
        ]);

        //16
        Text::create([
            'text' => '1500 руб.',
            'table_rel' => 'elements',
            'table_id' => 12,
            'sort' => 3
        ]);

        //17
        Text::create([
            'text' => 'Детская стрижка',
            'table_rel' => 'elements',
            'table_id' => 12,
            'sort' => 4
        ]);

        //18
        Text::create([
            'text' => '500 руб.',
            'table_rel' => 'elements',
            'table_id' => 12,
            'sort' => 5
        ]);
    }
}
