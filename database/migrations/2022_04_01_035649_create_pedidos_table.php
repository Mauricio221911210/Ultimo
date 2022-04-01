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
            $table->date('fecha')->nullable();
            $table->foreignId('id_usuario')->references('id')->on('users')->cascadeOnDelete();
            $table->string('name');
            $table->foreignId('id_producto')->references('id')->on('products')->cascadeOnDelete();
            $table->double('piezas_Unidad');
            $table->double('cantidad');
            $table->double('precio');
            $table->double('total');
            $table->double('total_venta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
