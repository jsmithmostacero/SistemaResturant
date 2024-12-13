<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proveedors');
            $table->string('documento',20);                # Tipo de comprobante
            $table->string('numero_compra');
            $table->unsignedBigInteger('id_productos');
            $table->string('cantidad');
            $table->string('precio_compra');
            $table->decimal('impuesto',4,2);                     # Impuesto a pagar
            // $table->decimal('total',11,2);                  # Total a pagar
            $table->string('status',20); #estado de la compra



            $table->foreign('id_proveedors')->references('id')->on('proveedors');
            $table->foreign('id_productos')->references('id')->on('productos');

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
        Schema::dropIfExists('compras');
    }
}
