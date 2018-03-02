<?php

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *       $table->string('path', 255);
     *       $table->unsignedBigInteger('size');
     *       $table->string('alt', 255)->nullable();
     *       $table->string('title', 255)->nullable();
     *       $table->string('oldname', 255);
     *       $table->string('ext', 10)->nullable();
     *       $table->string('mime', 50);
     *       $table->string('table_rel', 255)->nullable();
     *       $table->integer('table_id')->nullable();
     *       $table->integer('sort')->default(0);
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<4; $i++){
            Image::create([
                'path' => $i.'.jpg',
                'size' => '100000',
                'oldname' => 'images/'.$i.'.jpg',
                'ext' => 'jpg',
                'mime' => 'image/jpeg',
                'table_rel' => 'blocks',
                'table_id' => '1',
                'sort' => $i
            ]);
        }
        
        for ($i=0; $i<4; $i++){
            Image::create([
                'path' => 4+$i.'.jpg',
                'size' => '100000',
                'oldname' => 'images/'.$i.'.jpg',
                'ext' => 'jpg',
                'mime' => 'image/jpeg',
                'table_rel' => 'elements',
                'table_id' => 2+$i,
                'sort' => 0,
            ]);
        }
        
        for ($i=4; $i<9; $i++){
            Image::create([
                'path' => $i.'.jpg',
                'size' => '100000',
                'oldname' => 'images/'.$i.'.jpg',
                'ext' => 'jpg',
                'mime' => 'image/jpeg',
                'table_rel' => 'elements',
                'table_id' => 6,
                'sort' => $i,
            ]);
        }


    }
}
