<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PrivesTableSeeder::class);
        $this->call(PriveRoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TemplatesTableSeeder::class);
        //$this->call(ImagesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        //$this->call(BlocksTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        //$this->call(ElementsTableSeeder::class);
        //$this->call(TextsTableSeeder::class);
        //$this->call(IconsTableSeeder::class);
        //$this->call(ReviewsTableSeeder::class);
        
        
    }
}
