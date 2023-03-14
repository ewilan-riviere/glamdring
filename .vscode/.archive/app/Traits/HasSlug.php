<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * class Project extends Model
 * {
 *   use HasSlug;
 *
 *   // to override
 *   protected $slug_twin = 'name';
 *   protected $slug_column = 'slug';
 * }
 */
trait HasSlug
{
    protected $default_slug_twin = 'name';

    protected $default_slug_column = 'slug';

    public function getSlugTwin()
    {
        return $this->slug_twin ?? $this->default_slug_twin;
    }

    public function getSlugColumn()
    {
        return $this->slug_column ?? $this->default_slug_column;
    }

    protected static function bootHasSlug()
    {
        static::creating(function ($model) {
            $model->{$model->getSlugColumn()} = $model->generateUniqueSlug($model->{$model->getSlugTwin()}, 0, $model->getSlugColumn());
        });
    }

    protected function generateUniqueSlug(string $name, int $counter = 0, string $slug_field = 'slug')
    {
        $updated_name = 0 == $counter ? $name : $name.'-'.$counter;
        if (static::where($slug_field, Str::slug($updated_name))->exists()) {
            return $this->generateUniqueSlug($name, $counter + 1);
        }
        return Str::slug($updated_name);
    }
}
