<?php

namespace App\Models\Oferta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'ofertas';

    protected $fillable = [
        'usuario_id',
        'titulo',
        'descripcion',
        'ubicacion',
        'precio_ofrecido',
        'fecha_limite',
        'estado_id',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación con el modelo Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    // Relación con el modelo Aplicacion
    public function aplicaciones()
    {
        return $this->hasMany(Aplicacion::class);
    }

    // Relación con el modelo Contrato
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}