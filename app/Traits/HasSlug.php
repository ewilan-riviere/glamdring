<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

trait HasSlug
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Make a slug from a given field value.
     *
     * @usage: Add the following in your model boot() method.
     *
     * static::creating(function($article) {
     *     $article->slug = $article->makeSlug();
     * });
     *
     * @return string
     */
    public function makeSlug(string $from = 'title', string $column = 'slug')
    {
        $slug = Str::slug($this->{$from});

        $count = self::whereRaw("{$column} RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    /**
     * Find a model by its slug.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function findBySlug(string $slug, array $columns = ['*'])
    {
        $result = self::where('slug', $slug)->first($columns);

        if (! is_null($result)) {
            return $result;
        }

        throw (new ModelNotFoundException())->setModel((new self())->getTable());
    }
}
