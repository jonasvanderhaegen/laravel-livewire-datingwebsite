<?php

use Modules\Testimonial\Models\Testimonial;

it('returns the uppercase first letter of lastname as last_initial', function () {
    $testimonial = new Testimonial([
        'lastname' => 'doe',
    ]);

    expect($testimonial->last_initial)->toBe('D');
});

it('returns empty string when lastname is null', function () {
    $testimonial = new Testimonial();

    expect($testimonial->last_initial)->toBe('');
});

it('appends last_initial when converting to array', function () {
    $testimonial = new Testimonial([
        'firstname' => 'Jane',
        'lastname'  => 'smith',
    ]);

    $array = $testimonial->toArray();

    expect($array)
        ->toHaveKey('last_initial')
        ->and($array['last_initial'])->toBe('S');
});

it('handles multibyte characters correctly', function () {
    $testimonial = new Testimonial([
        'lastname' => 'éclair',
    ]);

    expect($testimonial->last_initial)->toBe('É');
});
