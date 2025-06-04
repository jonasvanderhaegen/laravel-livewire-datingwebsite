<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Profile\Database\Factories\AgeFactory;

final class ProfileDynamicExtra extends Model
{
    // use HasFactory;

    public $incrementing = false;

    // protected static function newFactory(): AgeFactory
    // {
    //     // return AgeFactory::new();
    // }
    // Point at the view, not the real table:
    public $timestamps = false;

    // Views usually don’t have primary-key increments:
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // And typically no timestamps on a view:
    protected $table = 'profile_dynamic_extras';

    // If you need to filter by age, cast it to integer:
    protected $casts = [
        'age' => 'integer',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
