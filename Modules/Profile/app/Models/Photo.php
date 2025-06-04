<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Profile\Database\Factories\PhotoFactory;

final class Photo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PhotoFactory
    // {
    //     // return PhotoFactory::new();
    // }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
