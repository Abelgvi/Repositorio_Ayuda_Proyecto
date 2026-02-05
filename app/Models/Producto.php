<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto'; // Singular
    protected $primaryKey = 'id_producto'; // PK personalizada
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'categoria',
        'descripcion',
        'precio',
        'imagen',
        'stock',
        'estado',           // Nuevo campo de la BD ('si'/'no')
        'animal_objetivo',
    ];
}
