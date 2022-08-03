<?php

namespace App\Models;

use App\Enums\GitForgeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'forge_type',
        'is_public',
        'sort',
    ];

    protected $casts = [
        'forge_type' => GitForgeEnum::class,
        'is_public' => 'boolean',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
