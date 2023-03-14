<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kiwilan\Steward\Traits\HasSlug;

class Group extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $withCount = [
        'projects',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
