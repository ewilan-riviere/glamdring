<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\ForgeUser
 *
 * @property int $id
 * @property int|null $forge_id
 * @property string|null $username
 * @property string|null $api_token
 * @property string|null $email
 * @property string|null $avatar_url
 * @property string|null $html_url
 * @property string|null $repos_url
 * @property string|null $name
 * @property string|null $company
 * @property string|null $blog
 * @property string|null $location
 * @property string|null $bio
 * @property int|null $public_repos
 * @property int|null $public_gists
 * @property int|null $followers
 * @property int|null $following
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereBlog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereFollowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereFollowing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereForgeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereHtmlUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser wherePublicGists($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser wherePublicRepos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereReposUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForgeUser whereUsername($value)
 */
	class ForgeUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Database\Factories\GroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 */
	class Group extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $image
 * @property string|null $pipeline
 * @property int|null $main_technology_id
 * @property int|null $main_repository_id
 * @property int|null $group_id
 * @property int|null $main_website_id
 * @property \App\Enums\ProjectStatusEnum|null $project_status
 * @property bool $is_open_source
 * @property \Illuminate\Support\Carbon|null $begin_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Group|null $group
 * @property-read \App\Models\Repository|null $mainRepository
 * @property-read \App\Models\Technology|null $mainTechnology
 * @property-read \App\Models\Website|null $mainWebsite
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Repository[] $repositories
 * @property-read int|null $repositories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Technology[] $technologies
 * @property-read int|null $technologies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Website[] $websites
 * @property-read int|null $websites_count
 * @method static \Database\Factories\ProjectFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereBeginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsOpenSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMainRepositoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMainTechnologyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMainWebsiteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePipeline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Repository
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $url
 * @property \App\Enums\GitForgeEnum|null $forge_type
 * @property bool $is_public
 * @property int|null $sort
 * @property int|null $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project|null $project
 * @method static \Database\Factories\RepositoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Repository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Repository query()
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereForgeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repository whereUrl($value)
 */
	class Repository extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Submission
 *
 * @property int $id
 * @property string|null $app
 * @property string|null $name
 * @property string|null $email
 * @property string|null $ip
 * @property string|null $url
 * @property string|null $to
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SubmissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUrl($value)
 */
	class Submission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Technology
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $url
 * @property string|null $image
 * @property float|null $last_version
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Database\Factories\TechnologyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology query()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereLastVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereUrl($value)
 */
	class Technology extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

namespace App\Models{
/**
 * App\Models\Website
 *
 * @property int $id
 * @property string|null $label
 * @property string|null $url
 * @property string|null $login
 * @property string|null $password
 * @property string|null $type
 * @property \App\Enums\WebsiteEnum|null $website_type
 * @property bool $with_credentials
 * @property int|null $sort
 * @property int|null $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project|null $project
 * @method static \Database\Factories\WebsiteFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Website newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Website newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Website query()
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereWebsiteType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Website whereWithCredentials($value)
 */
	class Website extends \Eloquent {}
}

