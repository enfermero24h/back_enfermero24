<?php

namespace App\Models\Pasarela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasarela extends Model
{
    use HasFactory;

    protected $table = 'pasarelas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'configuracion',
        'estado_id',
    ];

    // Relación con el modelo Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    // Relación con el modelo PagoTrabajador
    public function pagosTrabajadores()
    {
        return $this->hasMany(PagoTrabajador::class);
    }
}
