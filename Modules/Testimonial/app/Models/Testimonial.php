<?php

declare(strict_types=1);

namespace Modules\Testimonial\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Tell PHPStan about the custom factory method and the “lastname” property:
 *
 * @property string|null $firstname
 * @property string|null $lastname
 */
final class Testimonial extends Model
{

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

    /**
     * @return Attribute<string, null>
     */
    protected function lastInitial(): Attribute
    {
        return Attribute::make(get: fn() => mb_strtoupper(mb_substr($this->lastname ?? '', 0, 1)));
    }
}
