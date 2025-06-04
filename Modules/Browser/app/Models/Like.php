<?php

declare(strict_types=1);

namespace Modules\Browser\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Browser\Database\Factories\LikeFactory;

final class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): LikeFactory
    // {
    //     // return LikeFactory::new();
    // }
}
