<?php

declare(strict_types=1);

namespace Modules\Statistics\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $lat_bucket
 * @property float $lng_bucket
 * @property int $user_count
 */
final class UserDensity extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [];

    protected $table = 'user_density';

    protected function casts(): array
    {
        return [
            'lat_bucket' => 'float',
            'lng_bucket' => 'float',
            'user_count' => 'integer',
        ];
    }
}
