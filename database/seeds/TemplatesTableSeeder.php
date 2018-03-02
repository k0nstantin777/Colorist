<?php

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *   $table->string('name', 255);
     *   $table->string('template',255);
     *   $table->string('type',255)->default('elements');
     *   $table->string('content', 255);
     * @return void
     */
    public function run()
    {
        //1
        Template::create([
            'name' => 'Большой слайдер',
            'template' => 'blocks.big-slider',
            'type'=> 'blocks',
            'content' => 'images,texts'
        ]);
        
        //2
        Template::create([
            'name' => 'Секция на белом фоне',
            'template' => 'blocks.section-white',
            'type'=> 'blocks',
            'content' => 'elements'
        ]);
        
        //3
        Template::create([
            'name' => 'Двухколоночный элемент с заголовком в одну колонку',
            'template' => 'elements.two-column-text-w-one-column-head',
            'type'=> 'elements',
            'content' => 'texts'
        ]);
        
        //4
        Template::create([
            'name' => 'Одноколоночный элемент с заголовоком и изображением ',
            'template' => 'elements.one-column-w-text-image-head',
            'type'=> 'elements',
            'content' => 'images,texts'
        ]);
        
        //5
        Template::create([
            'name' => 'Ленточная фотогаллерея',
            'template' => 'elements.image-gallery',
            'type'=> 'elements',
            'content' => 'images'
        ]);
        
        //6
        Template::create([
            'name' => 'Секция на голубом фоне',
            'template' => 'blocks.section-blue',
            'type'=> 'blocks',
            'content' => 'elements'
        ]);
        
        //7
        Template::create([
            'name' => 'Одноколоночный элемент с текстом и иконкой',
            'template' => 'elements.one-column-w-text-icons-head',
            'type'=> 'elements',
            'content' => 'icons,texts'
        ]);
        
        //8
        Template::create([
            'name' => 'Отзывы',
            'template' => 'blocks.reviews',
            'type'=> 'blocks',
            'content' => 'reviews,images'
        ]);

        //9
        Template::create([
            'name' => 'Двухколоночный текст с заголовком сверху',
            'template' => 'elements.two-column-text-w-head-top',
            'type'=> 'elements',
            'content' => 'texts'
        ]);

        //10
        Template::create([
            'name' => 'Трехколоночный элемент с изображениями',
            'template' => 'elements.three-column-w-images',
            'type'=> 'elements',
            'content' => 'images'
        ]);

        //11
        Template::create([
            'name' => 'Большая галлерея изображений на всю страницу',
            'template' => 'elements.big-gallery-all-page',
            'type'=> 'elements',
            'content' => 'images'
        ]);

        //12
        Template::create([
            'name' => 'Форма обратной связи',
            'template' => 'elements.feedback-form',
            'type'=> 'elements',
            'content' => ''
        ]);

        //13
        Template::create([
            'name' => 'Контакты',
            'template' => 'elements.contacts',
            'type'=> 'elements',
            'content' => 'icons,texts'
        ]);

        //14
        Template::create([
            'name' => 'Прайс-лист',
            'template' => 'elements.price-list',
            'type'=> 'elements',
            'content' => 'elements'
        ]);

        //15
        Template::create([
            'name' => 'Группа цен',
            'template' => 'elements.prices-group',
            'type'=> 'elements',
            'content' => 'texts'
        ]);


    }
}
