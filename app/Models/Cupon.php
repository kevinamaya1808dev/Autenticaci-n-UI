<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = 'cupones';

    protected $fillable = [
        'codigo',
        'tipo',
        'valor',
        'monto_minimo',
        'usos_maximos',
        'usos_realizados',
        'expira_en',
        'activo',
    ];

    protected $casts = [
        'valor'          => 'decimal:2',
        'monto_minimo'   => 'decimal:2',
        'activo'         => 'boolean',
        'expira_en'      => 'datetime',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cupon_id');
    }

    public function estaVigente(): bool
    {
        if (!$this->activo) return false;
        if ($this->expira_en && $this->expira_en->isPast()) return false;
        if ($this->usos_maximos && $this->usos_realizados >= $this->usos_maximos) return false;
        return true;
    }
}