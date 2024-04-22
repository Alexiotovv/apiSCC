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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cronograma')->unsigned();
            $table->foreign('id_cronograma')->references('id')->on('cronogramas')->onDelete('cascade');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->decimal('monto', 12, 2)->default(0.00);
            $table->string('metodo', 100)->default('');
            $table->tinyInteger('estado');//1 PENDIENTE, 2 COMPLETO, 3 PARCIALMENTE PAGADO
            $table->date('fecha');
            $table->time('hora');
            $table->string('archivo', 255)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
