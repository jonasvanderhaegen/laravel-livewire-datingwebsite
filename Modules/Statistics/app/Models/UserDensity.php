<?php

declare(strict_types=1);

namespace Modules\Statistics\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Statistics\Database\Factories\UserDensityFactory;

final class UserDensity extends Model
{
    use HasFactory;

    public $incrementing = false;

    // protected static function newFactory(): UserDensityFactory
    // {
    //     // return UserDensityFactory::new();
    // }

    // This model reads the view, so no auto-timestamps or PK
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected $table = 'user_density';

    protected $casts = [
        'lat_bucket' => 'float',
        'lng_bucket' => 'float',
        'user_count' => 'integer',
    ];
}
