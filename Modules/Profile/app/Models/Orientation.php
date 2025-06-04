<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Modules\Profile\Database\Factories\OrientationFactory;

final class Orientation extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [

    ];

    public function profile(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }

    // protected static function newFactory(): OrientationFactory
    // {
    //     // return OrientationFactory::new();
    // }
}
