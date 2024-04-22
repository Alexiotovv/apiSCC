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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_deudores')->unsigned();
            $table->foreign('id_deudores')->references('id')->on('deudores')->onDelete('cascade');
            $table->bigInteger('id_direcciones')->unsigned();
            $table->foreign('id_direcciones')->references('id')->on('direcciones')->onDelete('cascade');
            $table->string('concepto', 250)->default('');
            $table->decimal('monto', 8, 2)->default(0.00);
            $table->string('expediente', 250)->default('');
            $table->date('fecha');
            $table->decimal('uit', 8, 2)->default(0.00);
            $table->decimal('importe', 8, 2)->default(0.00);
            $table->string('resolucion_admin', 250)->default('');
            $table->date('fecha_resolucion_admin');
            $table->boolean('noaperturado')->default(false);
            $table->string('archivo', 250)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
