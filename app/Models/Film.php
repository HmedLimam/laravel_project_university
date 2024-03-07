<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'anneesortie', 'description', 'duree', 'categorie_id'];
    protected $hidden = ["created_at", "updated_at"];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
