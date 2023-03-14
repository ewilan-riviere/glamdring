<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    private static $sluggable = [
        'slug_column' => 'slug',
        'slug_from_column' => 'name',
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
