<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Trait for unique slug
 */
trait UniqueSlug
{
    public static function uniqueSlug($slug)
    {
        return self::where('slug', $slug)->count() > 0 ? $slug . '-' . Str::random(4) : $slug;
    }
}
