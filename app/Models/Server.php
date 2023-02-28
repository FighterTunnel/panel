<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'country_id',
        'ip',
        'host',
        'type',
        'ports',
        'limit',
        'current',
        'total',
        'config_file',
    ];
    protected $casts = [
        'ports' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function uniqueSlug($slug)
    {
        return self::where('slug', $slug)->count() > 0 ? $slug . '-' . Str::random(4) : $slug;
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function resetCurrent()
    {
        $this->current = 0;
        $this->save();
    }
}
