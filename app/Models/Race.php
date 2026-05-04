<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $table = 'races';

    protected $fillable = [
        'slug',
        'description',
        'imagen',
    ];

    protected $casts = [
        'imagen' => 'array',
    ];

    public function chios()
    {
        return $this->hasMany(Chio::class, 'raza', 'description');
    }
}
