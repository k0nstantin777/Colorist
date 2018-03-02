<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('hint')->nullable();
            $table->string('slug', 255);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_main')->nullable();
            $table->boolean('noindex')->default(0);
            $table->boolean('sitemap')->default(1);
            $table->integer('level')->default(1);
            $table->integer('parent_id')->nullable();
            $table->integer('childrens')->default(0);
            $table->integer('sort')->default(0);
            $table->string('title', 80)->nullable();
            $table->string('keywords', 250)->nullable();
            $table->string('description', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
