<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
        'pedido_id',
        'proveedor',
        'pago_externo_id',
        'estatus',
        'monto',
        'moneda',
        'metadatos',
        'pagado_en',
    ];

    protected $casts = [
        'monto'      => 'decimal:2',
        'metadatos'  => 'array',
        'pagado_en'  => 'datetime',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}