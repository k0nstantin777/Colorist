<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->text('description')->nullable();
            $table->string('slug', 255);
            $table->string('head',255)->nullable();
            $table->string('sub_head',255)->nullable();
            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('template_id')->unsigned()->nullable();
            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->integer('sort')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('blocks');
    }
}
