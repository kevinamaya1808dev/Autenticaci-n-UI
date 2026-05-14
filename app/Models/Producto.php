<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'slug',
        'descripcion',
        'precio',
        'precio_oferta',
        'existencia',
        'activo',
        'destacado',
    ];

    protected $casts = [
        'precio'       => 'decimal:2',
        'precio_oferta'=> 'decimal:2',
        'activo'       => 'boolean',
        'destacado'    => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class, 'producto_id');
    }

    public function imagenPrincipal()
    {
        return $this->hasOne(ImagenProducto::class, 'producto_id')->where('es_principal', true);
    }

    public function detallesPedido()
    {
        return $this->hasMany(DetallePedido::class, 'producto_id');
    }
}