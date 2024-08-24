<?php

namespace App\Models\PagoTrabajador;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoTrabajador extends Model
{
    use HasFactory;

    protected $table = 'pagos_trabajadores';

    protected $fillable = [
        'usuario_id',
        'monto',
        'estado_id',
        'pasarela_id',
        'referencia',
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

    // Relación con el modelo Pasarela
    public function pasarela()
    {
        return $this->belongsTo(Pasarela::class);
    }
}
