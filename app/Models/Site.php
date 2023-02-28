<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $casts = [
        'seo' => 'array',
        'cloudflare' => 'array',
        'banner' => 'array',
        'tunnel' => 'array',
        'total_accounts' => 'array',
    ];
}
