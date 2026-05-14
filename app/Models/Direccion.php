<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'usuario_id',
        'nombre_destinatario',
        'telefono',
        'calle',
        'ciudad',
        'estado',
        'codigo_postal',
        'predeterminada',
    ];

    protected $casts = [
        'predeterminada' => 'boolean',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}