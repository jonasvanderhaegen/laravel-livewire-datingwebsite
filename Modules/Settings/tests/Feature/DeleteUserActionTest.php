<?php

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Modules\Settings\Livewire\Actions\DeleteUser;


beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user, 'web');
});

it('soft-deletes the user, logs them out, regenerates the session token, and redirects home', function () {
    // 1) Capture the old CSRF token
    $oldToken = session()->token();

    /** @var RedirectResponse $response */
    $response = app(DeleteUser::class)();

    // 2) Response is a redirect to the home route
    expect($response)->toBeInstanceOf(RedirectResponse::class);
    expect($response->getStatusCode())->toBe(302);
    expect($response->headers->get('Location'))->toBe(route('home'));

    // 3) The user should be soft-deleted
    $this->assertSoftDeleted('users', ['id' => $this->user->id]);

    // 4) And the user is logged out
    $this->assertGuest('web');

    // 5) Finally, the session token was regenerated
    expect(session()->token())->not->toBe($oldToken);
});
