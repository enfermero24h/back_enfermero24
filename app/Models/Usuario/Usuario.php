<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
        'telefono',
        'direccion',
        'latitud',
        'longitud',
        'otp_code',
        'estado_id',
    ];

    // Relación con el modelo Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    // Relación con el modelo Servicio
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    // Relación con el modelo Oferta
    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }

    // Relación con el modelo Aplicacion
    public function aplicaciones()
    {
        return $this->hasMany(Aplicacion::class);
    }

    // Relación con el modelo Wallet
    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    // Relación con el modelo PagoTrabajador
    public function pagosTrabajadores()
    {
        return $this->hasMany(PagoTrabajador::class);
    }
}