<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Modules\Profile\Database\Factories\LanguageFactory;

final class Language extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): LanguageFactory
    // {
    //     // return LanguageFactory::new();
    // }

    public function profile(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }
}
