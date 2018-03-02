<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Krucas\Settings\Facades\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::set('TIMEZONE', 'Asia/Yekaterinburg');
        Settings::set('MAIL_TO', 'bumer110685@yandex.ru');
        Settings::set('MAIL_FROM_ADDRESS', 'bumer110685@yandex.ru');
        Settings::set('MAIL_FROM_NAME', 'colorista');
        Settings::set('MAIL_HOST', 'smtp.yandex.ru');
        Settings::set('MAIL_PORT', '465');
        Settings::set('MAIL_ENCRYPTION', 'ssl');
        Settings::set('MAIL_USERNAME', 'bumer110685@yandex.ru');
        Settings::set('MAIL_PASSWORD', 'qazpl,!@#');
                
    }
}
