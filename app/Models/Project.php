<?php

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kiwilan\Steward\Traits\HasSlug;

class Project extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'git_id',
        'name',
        'slug',
        'path',
        'description',
        'default_branch',
        'git_created_at',
        'git_updated_at',

        'web_url',
        'clone_url',
        'avatar_url',

        'readme_raw',
        'package_json_raw',
        'composer_json_raw',

        'visibility',
        'is_open_source',

        'project_status',
        'pipeline',

        'repository_id',
        'technology_id',
        'website_id',
    ];

    protected $casts = [
        'git_id' => 'integer',
        'git_created_at' => 'datetime:Y-m-d',
        'git_updated_at' => 'datetime:Y-m-d',
        'is_open_source' => 'boolean',
        'project_status' => ProjectStatusEnum::class,
    ];

    protected $withCount = [
        'websites',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
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

    public function websites(): HasMany
    {
        return $this->hasMany(Website::class);
    }

    public function repository(): BelongsTo
    {
        return $this->belongsTo(Repository::class);
    }

    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
