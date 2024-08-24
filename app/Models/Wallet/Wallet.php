<?php

namespace App\Models\Wallet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallets';

    protected $fillable = [
        'usuario_id',
        'saldo_inicial',
        'saldo_final',
        'tipo_transaccion',
        'monto',
        'referencia',
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
}
