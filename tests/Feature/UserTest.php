<?php

declare(strict_types=1);

use App\Models\User;

it('can be created via factory', function () {
    /** @var User $user */
    $user = User::factory()->create();

    // The factory should give you a valid User instance
    expect($user)->toBeInstanceOf(User::class);

    // By default Laravel’s User factory fills in an email
    expect($user->email)->toBeString();
    // expect($user->email)->toEndWith('@example.com');
});

it('uses the default "name" attribute when none is provided by factory', function () {
    // If your factory doesn’t set a name, you can assert it’s not null:
    $user = User::factory()->create();
    expect($user->name)->not->toBeNull();
});
