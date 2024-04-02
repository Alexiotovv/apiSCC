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
        Schema::create('verificacion_registrals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_expedientes')->unsigned();
            $table->foreign('id_expedientes')->references('id')->on('expedientes')->onDelete('cascade');
            $table->bigInteger('id_vrestados')->unsigned();
            $table->foreign('id_vrestados')->references('id')->on('vr_estados')->onDelete('cascade');
            $table->bigInteger('id_vrobservaciones')->unsigned();
            $table->foreign('id_vrobservaciones')->references('id')->on('vr_observaciones')->onDelete('cascade');
            $table->tinyInteger('prescrito');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_registrals');
    }
};
