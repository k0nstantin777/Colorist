<?php

use Illuminate\Database\Seeder;
use App\Models\Block;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *      $table->string('name',255);
            $table->text('description')->nullable();
            $table->string('slug', 255);
            $table->string('head',255)->nullable();
            $table->string('sub_head',255)->nullable();
            $table->integer('page_id')->unsigned();
            $table->integer('template_id')->unsigned()->nullable();
            $table->integer('sort')->unsigned();
            $table->boolean('is_active')->default(1);
     *
     * @return void
     */
    public function run()
    {
        /*======= Главная страница ======= */
        //1
        Block::create([
            'name' => 'Большой слайдер на главной',
            'description' => 'Большой слайдер на главной странице с лозунгами',
            'slug' => url_slug('Большой слайдер на главной'),
            'page_id' => 1,
            'template_id' => 1,
            'sort' => 0
        ]);
        
        //2
        Block::create([
            'name' => 'Блок приветственного текста на главной',
            'description' => 'Блок приветственного текста на главной',
            'slug' => url_slug('Блок приветственного текста на главной'),
            'page_id' => 1,
            'template_id' => 2,
            'sort' => 1
            
        ]);
        
        //3
        Block::create([
            'name' => 'Наши услуги на главной',
            'description' => 'Наши услуги на главной',
            'slug' => url_slug('Наши услуги на главной'),
            'head' => 'Наши услуги',
            'page_id' => 1,
            'template_id' => 2,
            'sort' => 2
        ]);
        
        //4
        Block::create([
            'name' => 'Фотогаллерея на главной',
            'description' => 'Наши услуги на главной',
            'slug' => url_slug('Фотогаллерея на главной'),
            'head' => 'Фотогаллерея',
            'page_id' => 1,
            'template_id' => 2,
            'sort' => 3
        ]);
        
        //5
        Block::create([
            'name' => 'Наши преимущества на главной',
            'description' => 'Наши преимущества на главной',
            'slug' => url_slug('Наши преимущества на главной'),
            'head' => 'Почему стоит выбрать нас',
            'page_id' => 1,
            'template_id' => 6,
            'sort' => 4
        ]);
        
        //6
        Block::create([
            'name' => 'Отзывы на главной',
            'description' => 'Отзывы на главной',
            'slug' => url_slug('Отзывы на главной'),
            'head' => 'Отзывы',
            'page_id' => 1,
            'template_id' => 8,
            'sort' => 5
        ]);

        //7
        Block::create([
            'name' => 'Прайс-лист на главной',
            'description' => 'Прайс-лист на главной',
            'slug' => url_slug('Прайс-лист на главной'),
            'head' => 'Прайс-лист',
            'page_id' => 1,
            'template_id' => 2,
            'sort' => 6
        ]);

       
    }
}
