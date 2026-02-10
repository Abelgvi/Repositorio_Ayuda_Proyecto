<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // 1. Nombre de la tabla
    protected $table = 'producto'; 

    // 2. Clave primaria 
    protected $primaryKey = 'id';
    
    // 3. Timestamps 
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'categoria',
        'descripcion',
        'precio',
        'imagen',
        'stock',
        'activo',           
        'animal_objetivo',
    ];
    
    //  asegurarte de que 'precio' siempre sea un número decimal/float
    protected $casts = [
        'precio' => 'decimal:2',
        'activo' => 'boolean', // Para que Laravel lo trate como true/false
    ];
}