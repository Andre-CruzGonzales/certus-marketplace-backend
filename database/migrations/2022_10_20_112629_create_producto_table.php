<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('categoria_id')->nullable()->references('id')->on('categoria')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('marca_id')->nullable()->references('id')->on('marca')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre')->nullable();
            $table->string('imagen')->nullable();
            $table->text('descripcion')->nullable();
            $table->double('precio',8,2)->nullable();
            $table->char('estado_registro')->default('A');
            $table->integer('publicado')->default(0);
            $table->foreignId('categoria_id')->nullable()->references('id')->on('categoria');
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
        Schema::dropIfExists('producto');
    }
}
