<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campos', function (Blueprint $table) {
            $table->increments('id_produto');
            $table->string('nome_produto');
            $table->float('valor_produto');
            $table->integer('marca_produto')->unsigned();
            $table->float('estoque');
            $table->integer('cidade')->unsigned();
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('marca_produto')->references('id')->on('marca');
            $table->foreign('cidade')->references('id')->on('cidade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campos');
    }
};
