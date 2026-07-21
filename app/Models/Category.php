<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Article;

class Category extends Model{
    // Liaison avec la base de données
    protected $table = 'categories';

    // Liste des colonnes autorisées à être remplies automatiquement
    // lors de l'enregistrement du formulaire
    protected $fillable = [
        'name', 'slug'
    ];

    // Relation avec la table article
    public function articles() : HasMany {
        return $this->hasMany(Article::class);
    }
}
