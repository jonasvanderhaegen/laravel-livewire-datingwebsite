<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Browser\Http\Middleware\ProfileHasLocation;

beforeEach(function () {
    // Define the route so route('settings.account') resolves
    Route::get('/settings/account', fn() => '')->name('settings.account');
});

it('passes the request through when profile has js_location and lat/lng', function () {
    // 1) Make a “profile” object with all required properties
    $profile = (object) [
        'js_location' => true,
        'lat' => 1.23,
        'lng' => 4.56,
    ];
    // 2) Make a “user” object that has that profile
    $user = (object) [
        'profile' => $profile,
    ];
    // 3) Build a Request and tell it to return our fake user
    $request = Request::create('/any-url', 'GET');
    $request->setUserResolver(fn() => $user);

    $middleware = new ProfileHasLocation();

    // 4) If everything is set, the “$next” closure should be called
    $result = $middleware->handle($request, fn($req) => 'NEXT OK');

    expect($result)->toBe('NEXT OK');
});

it('redirects to settings.account when profile is missing location', function () {
    $profile = (object) [
        'js_location' => false,
        'lat' => null,
        'lng' => null,
    ];
    $user = (object) [
        'profile' => $profile,
    ];
    $request = Request::create('/any-url', 'GET');
    $request->setUserResolver(fn() => $user);

    $middleware = new ProfileHasLocation();

    /** @var RedirectResponse $response */
    $response = $middleware->handle($request, fn($req) => 'SHOULD NOT GET HERE');

    expect($response)
        ->toBeInstanceOf(RedirectResponse::class)
        ->and($response->getTargetUrl())->toEqual(route('settings.account'));
});
