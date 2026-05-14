<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'usuario_id',
        'direccion_id',
        'cupon_id',
        'numero_pedido',
        'estatus',
        'tipo_entrega',
        'subtotal',
        'descuento',
        'total',
        'notas',
    ];

    protected $casts = [
        'subtotal'  => 'decimal:2',
        'descuento' => 'decimal:2',
        'total'     => 'decimal:2',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function cupon()
    {
        return $this->belongsTo(Cupon::class, 'cupon_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'pedido_id');
    }

    public function pago()
    {
        return $this->hasOne(Pago::class, 'pedido_id');
    }

    public static function generarNumeroPedido(): string
    {
        return 'FLR-' . strtoupper(uniqid());
    }
}