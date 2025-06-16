<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Language extends Model
{
    public $timestamps = false;

    protected $fillable = [];

    public function getConnectionName(): ?string
    {
        // replace 'mysql' below with whatever `config('database.default')` returns
        return config('database.default');
    }

    /**
     * @return BelongsToMany<Profile, $this>
     */
    public function profile(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }
}
