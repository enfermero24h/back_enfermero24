<?php

namespace App\Models\Contrato;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $fillable = [
        'oferta_id',
        'servicio_id',
        'estado_id',
    ];

    // Relación con el modelo Oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
    }

    // Relación con el modelo Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    // Relación con el modelo Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}