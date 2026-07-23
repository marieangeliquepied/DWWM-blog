<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les champs autorisés à l'écriture ($fillable)
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'password',
        'role',
    ];

    /**
     * Les champs cachés
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts de types automatiques
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relation : Un utilisateur (admin) possède plusieurs articles
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
