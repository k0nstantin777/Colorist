<?php

use Illuminate\Database\Seeder;
use App\Models\Element;

class ElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *      $table->string('name',255);
     *      $table->text('description')->nullable();
     *      $table->string('head',255)->nullable();
     *      $table->string('sub_head',255)->nullable();
     *      $table->integer('block_id')->unsigned();
     *      $table->integer('template_id')->unsigned()->nullable();
     *      $table->integer('sort')->default(0);
     *      $table->boolean('is_active')->default(1);
     *
     * @return void
     */
    public function run()
    {
        //1
        Element::create([
            'name' => 'Двухколоночный текст с заголовком в одну колонку',
            'description' => 'Элемент разбитый на две колонки, одну из которых целиком занимает заголовок элемента',
            'head' => 'Добро пожаловать на наш сайт',
            'block_id' => 2,
            'template_id' => 3,
        ]);
        
        //2
        Element::create([
            'name' => 'Услуга мужские стрижки',
            'description' => 'Мужские стрижки услуги на главной',
            'head' => 'Мужские стрижки',
            'block_id' => 3,
            'sort' => 0,
            'template_id' => 4,
        ]);
        
        //3
        Element::create([
            'name' => 'Услуга женские стрижки',
            'description' => 'Женские стрижки услуги на главной',
            'head' => 'Женские стрижки',
            'block_id' => 3,
            'sort' => 1,
            'template_id' => 4,
        ]);
        
        //4
        Element::create([
            'name' => 'Услуги детские стрижки',
            'description' => 'Детские стрижки услуги на главной',
            'head' => 'Детские стрижки',
            'block_id' => 3,
            'sort' => 2,
            'template_id' => 4,
        ]);
        
        //5
        Element::create([
            'name' => 'Дополнительные услуги',
            'description' => 'Дополнительные услуги на главной',
            'head' => 'Дополнительные услуги',
            'block_id' => 3,
            'sort' => 3,
            'template_id' => 4,
        ]);
        
        //6
        Element::create([
            'name' => 'Фотогалллеря на главной',
            'description' => 'Фотогалллеря на главной',
            'head' => 'Фотогалллеря на главной',
            'block_id' => 4,
            'template_id' => 5,
        ]);
        
        //7
        Element::create([
            'name' => 'Преимущество 1',
            'description' => 'Преимущество 1',
            'head' => 'Выгодно',
            'block_id' => 5,
            'sort' => 0,
            'template_id' => 7,
        ]);
        
        //8
        Element::create([
            'name' => 'Преимущество 2',
            'description' => 'Преимущество 2',
            'head' => 'Качественно',
            'block_id' => 5,
            'sort' => 1,
            'template_id' => 7,
        ]);
        
        //9
        Element::create([
            'name' => 'Преимущество 3',
            'description' => 'Преимущество 3',
            'head' => 'Современно',
            'block_id' => 5,
            'sort' => 2,
            'template_id' => 7,
        ]);
        
        //10
        Element::create([
            'name' => 'Преимущество 4',
            'description' => 'Преимущество 4',
            'head' => 'Доступно',
            'block_id' => 5,
            'sort' => 3,
            'template_id' => 7,
        ]);

        //11
        Element::create([
            'name' => 'Прайс-лист на главной',
            'description' => 'Прайс-лист на главной',
            'head' => 'Прайс-лист на главной',
            'block_id' => 7,
            'sort' => 0,
            'template_id' => 14,
        ]);

        //12
        Element::create([
            'name' => 'Стрижки',
            'description' => 'Группа цен Стрижки',
            'head' => 'Стрижки',
            //'block_id' => 7,
            'element_id' => 11,
            'sort' => 0,
            'template_id' => 15,
        ]);


    }
}
