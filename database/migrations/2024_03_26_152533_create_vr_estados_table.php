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
        Schema::create('vr_estados', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 255)->default('');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vr_estados');
    }
};
