<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->text('description')->nullable();
            $table->string('head',255)->nullable();
            $table->string('sub_head',255)->nullable();
            $table->integer('block_id')->unsigned()->nullable();
            $table->foreign('block_id')
                ->references('id')
                ->on('blocks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('element_id')->unsigned()->nullable();
            $table->foreign('element_id')
                ->references('id')
                ->on('elements')
                ->onDelete('set null')
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
        Schema::dropIfExists('elements');
    }
}
