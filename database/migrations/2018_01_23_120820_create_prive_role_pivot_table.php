<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriveRolePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prive_role', function (Blueprint $table) {
            $table->integer('prive_id')
                ->unsigned()
                ->nullable();
            $table->foreign('prive_id')
                ->references('id')
                ->on('prives')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('role_id')
                ->unsigned()
                ->nullable();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['prive_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prive_role');
    }
}
