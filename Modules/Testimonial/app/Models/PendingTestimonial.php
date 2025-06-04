<?php

declare(strict_types=1);

namespace Modules\Testimonial\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Testimonial\Database\Factories\TestimonialFactory;

final class PendingTestimonial extends Model
{
    public $casts = [
        'match' => 'boolean',
        'amount' => 'boolean',
        'time' => 'boolean',
    ];
    //  use HasFactory;

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

    //  protected static function newFactory(): TestimonialFactory
    //  {
    //      return TestimonialFactory::new();
    //  }
}
