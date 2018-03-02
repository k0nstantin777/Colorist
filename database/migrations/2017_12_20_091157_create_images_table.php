<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path', 255);
            $table->unsignedBigInteger('size');
            $table->string('alt', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('oldname', 255);
            $table->string('ext', 10)->nullable();
            $table->string('mime', 50);
            $table->string('table_rel', 255)->nullable();
            $table->integer('table_id')->nullable();
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('images');
    }
}
