<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Page::create([
            'name' => 'Главная',
            'hint' => 'Главная страница',
            'slug' => 'home',
            'is_main' => 1,
            'title' => 'Colorista Hair Couture',
            'keywords' => 'Парикмахерская, салон',
            'description' => 'Главная страница'
        ]);
                      
        //2
        Page::create([
            'name' => 'Услуги',
            'hint' => 'Страница предоставляемых услуг',
            'slug' => 'services',
            'sort'=> 1,
            //'childrens' => 2,
            'title' => 'Услуги',
            'keywords' => 'Парикмахерская, салон',
            'description' => 'Услуги парикмахерской'
        ]);
        
        //3
        Page::create([
            'name' => 'О нас',
            'hint' => 'Страница "О нас"',
            'slug' => 'about',
            'sort'=> 2,
            'title' => 'О нас',
            'keywords' => 'Парикмахер',
            'description' => 'Парикмахер'
        ]);
        
        //4
        Page::create([
            'name' => 'Галлерея',
            'hint' => 'Галлерея фотографий',
            'slug' => 'gallery',
            'sort'=> 3,
            'title' => 'Галлерея',
            'keywords' => 'Галлерея, паркмахерская, фотографии, прически',
            'description' => 'Галлерея парикмахерских услуг'
        ]);
        
        //5
        Page::create([
            'name' => 'Контакты',
            'hint' => 'Страница возможных контактов',
            'slug' => 'contacts',
            'sort'=> 4,
            'title' => 'Контакты',
            'keywords' => 'Парикмахерская',
            'description' => 'Страница возможных контактов'
        ]);
        
//        //6
//        Page::create([
//            'name' => 'Мужские стрижки',
//            'hint' => 'Страница услуги мужских стрижек',
//            'slug' => 'men',
//            'sort'=> 1,
//            'level' => 2,
//            'parent_id' => 2,
//            'title' => 'Мужские стрижки',
//            'keywords' => 'Мужские стрижки',
//            'description' => 'Услуги парикмахерской'
//        ]);
//
//        //7
//        Page::create([
//            'name' => 'Женские стрижки',
//            'hint' => 'Страница услуги женские стрижки',
//            'slug' => 'women',
//            'sort'=> 2,
//            'level' => 2,
//            'parent_id' => 2,
//            'title' => 'Женские стрижки',
//            'keywords' => 'Женские стрижки',
//            'description' => 'Услуги парикмахерской'
//        ]);
    }
}
