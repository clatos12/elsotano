<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'titulo',
        'fotografia',
        'descripcion',
        'categoria',
        'usuario_id',
        'precio',
        'estado'
    ];

    // Relación con el modelo User (si es necesario)
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
