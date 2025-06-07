<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


final class Preference extends Model
{

    public $timestamps = false;
    
    protected $fillable = [];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
