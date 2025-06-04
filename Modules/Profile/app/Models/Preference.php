<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Profile\Database\Factories\PreferenceFactory;

final class Preference extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PreferenceFactory
    // {
    //     // return PreferenceFactory::new();
    // }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
