<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cupones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->enum('tipo', ['porcentaje', 'fijo']);
            $table->decimal('valor', 10, 2);
            $table->decimal('monto_minimo', 10, 2)->default(0);
            $table->integer('usos_maximos')->nullable();
            $table->integer('usos_realizados')->default(0);
            $table->timestamp('expira_en')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cupones');
    }
};