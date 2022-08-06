<?php

namespace App\Models;

use App\Enums\GitForgeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string|null             $web_url
 * @property \App\Enums\GitForgeEnum $forge_type
 */
class ForgeUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'forge_id',
        'username',
        'api_token',
        'email',
        'forge_type',
        'avatar_url',
        'web_url',
        'repos_url',
        'name',
        'company',
        'blog',
        'location',
        'bio',
        'public_repos',
        'public_gists',
        'followers',
        'following',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'forge_id' => 'integer',
        'forge_type' => GitForgeEnum::class,
        'public_repos' => 'integer',
        'public_gists' => 'integer',
        'followers' => 'integer',
        'following' => 'integer',
    ];

    public static function convert(mixed $data): ForgeUser
    {
        return ForgeUser::create((array) $data);
    }
}
