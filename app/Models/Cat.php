<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $table = 'cats';

    protected $fillable = [
        'nom',
        'slug',
        'race',
        'age_mois',
        'sexe',
        'description',
        'images',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'age_mois' => 'integer',
    ];

    public function scopeByRace($query, $race)
    {
        return $query->where('race', $race);
    }

    public function scopeDisponible($query)
    {
        return $query->where('status', 'disponible');
    }

    public function getAgeFormattedAttribute()
    {
        if (!$this->age_mois) {
            return null;
        }

        $annees = floor($this->age_mois / 12);
        $mois = $this->age_mois % 12;

        if ($annees > 0 && $mois > 0) {
            return "{$annees} an" . ($annees > 1 ? 's' : '') . " et {$mois} mois";
        } elseif ($annees > 0) {
            return "{$annees} an" . ($annees > 1 ? 's' : '');
        } else {
            return "{$mois} mois";
        }
    }
}
