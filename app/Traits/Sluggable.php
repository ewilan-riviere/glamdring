<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    private static $__sluggable = [
        'slug_column' => 'slug',
        'slug_from_column' => 'title',
    ];

    protected static function bootSluggable()
    {
        self::setSluggableConfig();  // set initial config for sluggable

        static::creating(function ($model) {
            $model->{self::$__sluggable['slug_column']} = $model->generateUniqueSlug(
                $model->{self::$__sluggable['slug_from_column']},
                0,
                self::$__sluggable['slug_column']
            );
        });
    }

    private static function setSluggableConfig()
    {
        if (isset(self::$sluggable['slug_column'])) {
            self::$__sluggable['slug_column'] = self::$sluggable['slug_column'];
        } else {
            self::$__sluggable['slug_column'] = 'slug';
        }

        if (isset(self::$sluggable['slug_from_column'])) {
            self::$__sluggable['slug_from_column'] = self::$sluggable['slug_from_column'];
        } else {
            self::$__sluggable['slug_from_column'] = 'title';
        }
    }

    private function generateUniqueSlug(string $name, int $counter = 0, string $slugField = 'slug')
    {
        $updatedName = 0 == $counter ? $name : $name.'-'.$counter;
        if (static::where($slugField, Str::slug($updatedName))->exists()) {
            return $this->generateUniqueSlug($name, $counter + 1);
        }
        return Str::slug($updatedName);
    }
}
