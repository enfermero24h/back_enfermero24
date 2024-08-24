<?php

namespace App\Models\Aplicacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    use HasFactory;

    protected $table = 'aplicaciones';

    protected $fillable = [
        'usuario_id',
        'oferta_id',
        'estado_id',
        'fecha_aplicacion',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación con el modelo Oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
    }

    // Relación con el modelo Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}