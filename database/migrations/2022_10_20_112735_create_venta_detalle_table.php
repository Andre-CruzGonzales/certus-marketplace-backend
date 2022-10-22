<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalogo_venta_id')->nullable()->references('id')->on('catalogo_venta')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('venta_id')->nullable()->references('id')->on('venta')->onUpdate('cascade')->onDelete('cascade');
            $table->double('precio_venta',8,2)->nullable();
            $table->string('nombre')->nullable();
            $table->integer('cantidad')->nullable();
            $table->double('precio_unitario',8,2)->nullable();
            $table->char('estado_registro')->default('A');
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
        Schema::dropIfExists('venta_detalle');
    }
}
