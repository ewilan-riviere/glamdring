<?php

namespace App\Models;

use App\Enums\WebsiteEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'url',
        'login',
        'password',
        'website_type',
        'with_credentials',
        'sort',
    ];

    protected $casts = [
        'website_type' => WebsiteEnum::class,
        'with_credentials' => 'boolean',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
