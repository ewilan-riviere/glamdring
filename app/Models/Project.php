<?php

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'is_open_source',
        'pipeline',
        'begin_at',
        'main_repository_id',
        'main_technology_id',
        'main_website_id',
        'project_status',
    ];

    protected $casts = [
        'is_open_source' => 'boolean',
        'begin_at' => 'datetime:Y-m-d',
        'project_status' => ProjectStatusEnum::class,
    ];

    protected $withCount = [
        'websites',
    ];

    public function websites(): HasMany
    {
        return $this->hasMany(Website::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function repositories(): HasMany
    {
        return $this->hasMany(Repository::class);
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

    public function mainRepository(): BelongsTo
    {
        return $this->belongsTo(Repository::class);
    }

    public function mainTechnology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }

    public function mainWebsite(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
