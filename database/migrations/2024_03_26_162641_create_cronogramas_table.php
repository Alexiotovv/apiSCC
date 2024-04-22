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
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_expedientes')->unsigned();
            $table->foreign('id_expedientes')->references('id')->on('expedientes')->onDelete('cascade');
            $table->integer('numero_cuotas')->default(0);
            $table->date('fecha_inicial_pago');
            $table->decimal('monto_pagar', 12, 2)->default(0.00);
            $table->decimal('interes_aplicado', 12, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cronogramas');
    }
};
