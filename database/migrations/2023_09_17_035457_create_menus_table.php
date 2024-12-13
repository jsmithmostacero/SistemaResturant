<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_categoria')->constrained();
            $table->string('nombre');
            $table->string('categoria');
            $table->string('precio', 8,2);
            $table->string('descripcion');
            $table->boolean('activo')->default(true);
            $table -> boolean('eliminado')->default(0);
            $table->integer('stockDiario')->default(0);
            $table->string('imagen');
            $table->foreign('id_categoria')->references('id')->on('categorias');
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
        Schema::dropIfExists('menus');
    }
}
