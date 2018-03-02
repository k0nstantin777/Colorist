<?php

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  $table->string('author', 255);
     *  $table->text('text', 500);
     *  $table->integer('image_id')->unsigned()->nullable();
     *  $table->integer('block_id')->unsigned();
     *  $table->integer('sort')->default(0);
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'author' => 'Иван Иванов',
            'text' => '&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo;',
            'block_id' => 6,
            'sort' => 0
        ]);
        
        Review::create([
            'author' => 'Петр Петров',
            'text' => '&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while.&rdquo;',
            'block_id' => 6,
            'sort' => 1
        ]);
        
        Review::create([
            'author' => 'Василий Васильев',
            'text' => '&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.&rdquo;',
            'block_id' => 6,
            'sort' => 2
        ]);

    }
}
