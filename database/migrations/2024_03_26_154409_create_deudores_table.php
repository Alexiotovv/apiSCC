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
        Schema::create('deudores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tipopersonas')->unsigned();
            $table->foreign('id_tipopersonas')->references('id')->on('tipo_personas')->onDelete('cascade');
            $table->bigInteger('id_distritos')->unsigned();
            $table->foreign('id_distritos')->references('id')->on('distritos')->onDelete('cascade');
            $table->string('ruc', 12)->default('');
            $table->string('dni', 12)->default('');
            $table->string('razon', 250)->default('');
            $table->string('nombre', 250)->default('');
            $table->string('apellidos', 250)->default('');
            $table->string('nombre_rep', 250)->default('');
            $table->string('apellidos_rep', 250)->default('');
            $table->string('dni_rep', 250)->default('');
            $table->string('domicilio', 250)->default('');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudores');
    }
};
