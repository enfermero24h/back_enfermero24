<?php

namespace App\Models\IntegracionPago;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegracionPago extends Model
{
    use HasFactory;

    protected $table = 'integraciones_pago';

    protected $fillable = [
        'nombre',
        'tipo',
        'configuracion',
        'estado_id',
    ];

    // Relación con el modelo Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}