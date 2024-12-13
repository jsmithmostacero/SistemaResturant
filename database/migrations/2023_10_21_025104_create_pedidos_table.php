<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente',150);
            $table->string('apellidosCliente',170);
            $table->string('celular',9)->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->boolean('delivery');
            $table->text('notas')->nullable();
           //  $table->decimal('monto');
            $table->boolean('activo')->default(true);

           $table->string('ticket_type',20);                # Tipo de comprobante
           $table->string('ticket_serie',7)->nullable();    # serie de comprobante
           $table->string('ticket_number',10);              # Numero de comprobante

           $table->decimal('tax',4,2);                     # Impuesto a pagar
           $table->decimal('total',11,2);                  # Total a pagar

           $table->string('status',20); #estado de la venta (cancelada, anulada, procesada)

           $table->foreignId('id_user');
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
        Schema::dropIfExists('sales');
    }
}
