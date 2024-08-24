<?php

namespace App\Models\Servicio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'usuario_id',
        'titulo',
        'descripcion',
        'precio',
        'latitud',
        'direccion',
        'longitud',
        'disponibilidad',
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

    // Relación con el modelo Contrato
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
