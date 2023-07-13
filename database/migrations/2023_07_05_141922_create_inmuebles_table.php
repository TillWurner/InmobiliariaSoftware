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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('coordenada')->nullable();
            $table->integer('tamano');
            $table->string('direccion');
            $table->integer('precio');
            $table->enum('razon', ['alquiler', 'venta', 'anticretico']);
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('id_propietario')->nullable();
            $table->foreign('id_propietario')->references('id')->on('propietarios');
            $table->unsignedBigInteger('id_asesor')->nullable();
            $table->foreign('id_asesor')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
