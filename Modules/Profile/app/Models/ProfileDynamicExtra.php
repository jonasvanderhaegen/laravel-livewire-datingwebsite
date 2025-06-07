<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class ProfileDynamicExtra extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [];

    protected $table = 'profile_dynamic_extras';

    /**
     * @return BelongsTo<Profile, $this>
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    protected function casts(): array
    {
        return [
            'age' => 'integer',
        ];
    }
}
