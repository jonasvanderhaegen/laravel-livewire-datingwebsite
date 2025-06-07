<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


final class Interest extends Model
{
    public $timestamps = false;

    protected $fillable = [];

    public function profile(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }
}
