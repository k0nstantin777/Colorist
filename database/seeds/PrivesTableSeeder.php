<?php

use Illuminate\Database\Seeder;
use App\Models\Prive;

class PrivesTableSeeder extends Seeder
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
       Prive::create([
           'name' => 'superuser',
           'discription' => 'Суперпользователь'
       ]);
               
       /**
        * 2
        */
       Prive::create([
           'name' => 'admin_access',
           'discription' => 'Вход в админку'
       ]);

        /**
         * 3
         */
        Prive::create([
            'name' => 'user_index',
            'discription' => 'Просмотр пользователей'
        ]);

       /**
        * 4
        */
       Prive::create([
           'name' => 'user_create',
           'discription' => 'Создание пользователей'
       ]);
       
       /**
        * 5
        */
       Prive::create([
           'name' => 'user_update',
           'discription' => 'Редактирование пользователей'
       ]);
       
       /**
        * 6
        */
       Prive::create([
           'name' => 'user_delete',
           'discription' => 'Удаление пользователей'
       ]);
       
       /**
        * 7
        */
       Prive::create([
           'name' => 'prive_update',
           'discription' => 'Редактирование прав'
       ]);

        /**
         * 8
         */
        Prive::create([
            'name' => 'page_index',
            'discription' => 'Просмотр и сортировка страниц'
        ]);

        /**
         * 9
         */
        Prive::create([
            'name' => 'page_create',
            'discription' => 'Создание страниц'
        ]);

        /**
         * 10
         */
        Prive::create([
            'name' => 'page_update',
            'discription' => 'Редактирование страниц'
        ]);

        /**
         * 11
         */
        Prive::create([
            'name' => 'page_delete',
            'discription' => 'Удаление страниц'
        ]);

        /**
         * 12
         */
        Prive::create([
            'name' => 'block_create',
            'discription' => 'Создание блоков'
        ]);

        /**
         * 13
         */
        Prive::create([
            'name' => 'block_update',
            'discription' => 'Редактирование блоков'
        ]);

        /**
         * 14
         */
        Prive::create([
            'name' => 'block_delete',
            'discription' => 'Удаление блоков'
        ]);

        /**
         * 15
         */
        Prive::create([
            'name' => 'element_create',
            'discription' => 'Создание элементов'
        ]);

        /**
         * 16
         */
        Prive::create([
            'name' => 'element_update',
            'discription' => 'Редактирование элементов'
        ]);

        /**
         * 17
         */
        Prive::create([
            'name' => 'element_delete',
            'discription' => 'Удаление элементов'
        ]);

        /**
         * 18
         */
        Prive::create([
            'name' => 'review_index',
            'discription' => 'Создание отзывов'
        ]);

        /**
         * 19
         */
        Prive::create([
            'name' => 'review_create',
            'discription' => 'Создание отзывов'
        ]);

        /**
         * 20
         */
        Prive::create([
            'name' => 'review_update',
            'discription' => 'Редактирование отзывов'
        ]);

        /**
         * 21
         */
        Prive::create([
            'name' => 'review_delete',
            'discription' => 'Удаление отзывов'
        ]);

        /**
         * 22
         */
        Prive::create([
            'name' => 'message_index',
            'discription' => 'Просмотр списка сообщений'
        ]);

        /**
         * 23
         */
        Prive::create([
            'name' => 'message_show',
            'discription' => 'Чтение сообщения'
        ]);

        /**
         * 24
         */
        Prive::create([
            'name' => 'message_delete',
            'discription' => 'Удаление сообщений'
        ]);

        /**
         * 25
         */
        Prive::create([
            'name' => 'settings_update',
            'discription' => 'Управление настройками сайта'
        ]);


    }
}
