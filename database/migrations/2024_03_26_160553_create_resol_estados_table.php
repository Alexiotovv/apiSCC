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
        Schema::create('resol_estados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_expediente')->unsigned();
            $table->foreign('id_expediente')->references('id')->on('expedientes')->onDelete('cascade');
            $table->string('descripcion', 250)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resol_estados');
    }
};
