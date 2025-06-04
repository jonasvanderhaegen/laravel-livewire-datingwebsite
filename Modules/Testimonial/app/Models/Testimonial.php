<?php

declare(strict_types=1);

namespace Modules\Testimonial\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Testimonial\Database\Factories\TestimonialFactory;

final class Testimonial extends Model
{
    use HasFactory;

    public $casts = [
        'match' => 'boolean',
        'amount' => 'boolean',
        'time' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'match',
        'amount',
        'time',
        'short',
        'long',
    ];

    // Append it automatically if you like
    protected $appends = ['last_initial'];

    public function getLastInitialAttribute(): string
    {
        return mb_strtoupper(mb_substr($this->lastname ?? '', 0, 1));
    }

    protected static function newFactory(): TestimonialFactory
    {
        return TestimonialFactory::new();
    }
}
