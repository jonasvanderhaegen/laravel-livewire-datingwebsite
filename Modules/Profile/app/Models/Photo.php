<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Modules\Profile\Database\Factories\PhotoFactory;

final class Photo extends Model
{
    use HasFactory;

    protected $fillable = [];

    /**
     * @return BelongsTo<Profile, $this>
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    protected static function booted(): void
    {
        self::creating(function (Photo $photo) {
            if (empty($photo->ulid)) {
                $photo->ulid = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): PhotoFactory
    {
        return PhotoFactory::new();
    }
}
