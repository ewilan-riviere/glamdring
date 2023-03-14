<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kiwilan\Steward\Traits\HasSlug;

class Technology extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'url',
        'last_version',
        'color',
    ];

    protected $casts = [
        'last_version' => 'float',
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
