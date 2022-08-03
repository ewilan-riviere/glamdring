<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    use HasFactory;
    use Sluggable;

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
