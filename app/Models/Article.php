<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model{
    protected $table = 'articles';

    protected $fillable = [
        'title', 'slug', 'content', 'status', 'published_at', 'category_id', 'user_id'
    ];

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array {
        return [
        'published_at' => 'datetime'
        ];
    }
}
