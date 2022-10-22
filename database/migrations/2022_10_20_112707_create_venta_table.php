<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision');
            $table->double('precio_total',8,2)->nullable();
            $table->foreignId('cliente_id')->nullable()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vendedor_id')->nullable()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('empresa_id')->nullable()->references('id')->on('empresa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tipo_documento_venta_id')->nullable()->references('id')->on('tipo_documento_venta')->onUpdate('cascade')->onDelete('cascade');
            $table->char('estado_venta')->default('A');
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
        Schema::dropIfExists('venta');
    }
}
