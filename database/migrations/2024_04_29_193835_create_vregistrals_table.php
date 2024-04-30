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
        Schema::create('vregistrals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_expedientes')->unsigned();
            $table->foreign('id_expedientes')->references('id')->on('expedientes')->onDelete('cascade');
            $table->string('prescrito', 5)->default('NO');//SI //NO 
            $table->string('estado', 250)->nullable()->default('');
            $table->string('observaciones', 250)->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vregistrals');
    }
};
