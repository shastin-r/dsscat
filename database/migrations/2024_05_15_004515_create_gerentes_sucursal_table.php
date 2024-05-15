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
        Schema::create('gerentes_sucursal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gerente_general_id')->constrained('gerentes_generales');
            $table->foreignId('sucursal_id')->constrained('sucursales');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('dui')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerentes_sucursal');
    }
};
