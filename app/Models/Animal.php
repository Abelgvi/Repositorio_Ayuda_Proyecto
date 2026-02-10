<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    protected $fillable = [
        'user_id',
        'nombre',
        'especie' // Solo esto, nada más.
    ];

    public function dueno()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}