<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    // Apuntamos a la tabla que ya existe en tu BD
    protected $table = 'citas_peluqueria';

    protected $fillable = [
        'user_id',
        'fecha_cita',    
        'tipo_servicio', // Enum: 'baño','corte','deslanado','completo'
        'estado',        // Enum: 'pendiente','confirmada','cancelada'
        'precio_estimado'
    ];

    protected $casts = [
        'fecha_cita' => 'datetime', // Para que Laravel lo trate como objeto fecha
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
