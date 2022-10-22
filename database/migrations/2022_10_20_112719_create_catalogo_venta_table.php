<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_venta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->double('precio_venta',8,2)->nullable();
            $table->foreignId('producto_id')->nullable()->references('id')->on('producto')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('marca_id')->nullable()->references('id')->on('marca')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('categoria_id')->nullable()->references('id')->on('categoria')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('empresa_id')->nullable()->references('id')->on('empresa')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('catalogo_venta');
    }
}
