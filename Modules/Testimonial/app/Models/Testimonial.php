<?php

declare(strict_types=1);

namespace Modules\Testimonial\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Testimonial\Database\Factories\TestimonialFactory;

/**
 * Tell PHPStan about the custom factory method and the “lastname” property:
 *
 * @property string|null $firstname
 * @property string|null $lastname
 */
final class Testimonial extends Model
{
    // use HasFactory;

    public $casts = [
        'match' => 'boolean',
        'amount' => 'boolean',
        'time' => 'boolean',
    ];

    protected $fillable = [
        'firstname',
        'lastname',
        'match',
        'amount',
        'time',
        'short',
        'long',
    ];

    protected $appends = ['last_initial'];

    protected function lastInitial(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => mb_strtoupper(mb_substr($this->lastname ?? '', 0, 1)));
    }

    //    protected static function newFactory(): TestimonialFactory
    //    {
    //        return TestimonialFactory::new();
    //    }
}
