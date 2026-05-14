<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('direccion_id')->nullable()->constrained('direcciones')->nullOnDelete();
            $table->foreignId('cupon_id')->nullable()->constrained('cupones')->nullOnDelete();
            $table->string('numero_pedido')->unique();
            $table->enum('estatus', [
                'pendiente',
                'pagado',
                'en_proceso',
                'enviado',
                'entregado',
                'cancelado'
            ])->default('pendiente');
            $table->enum('tipo_entrega', ['domicilio', 'recoleccion'])->default('domicilio');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};