<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chio extends Model
{
    use HasFactory;

    protected $table = 'chios';

    protected $fillable = [
        'nombre',
        'slug',
        'raza',
        'descripcion',
        'imagenes',
        'enlace',
    ];

    protected $casts = [
        'imagenes' => 'array',
    ];

    public function race()
    {
        return $this->belongsTo(Race::class, 'description', 'raza');
    }

    public function scopeByRaza($query, $raza)
    {
        return $query->where('raza', $raza);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('nombre', 'LIKE', "%{$search}%")
              ->orWhere('raza', 'LIKE', "%{$search}%")
              ->orWhere('descripcion', 'LIKE', "%{$search}%");
        });
    }
}
