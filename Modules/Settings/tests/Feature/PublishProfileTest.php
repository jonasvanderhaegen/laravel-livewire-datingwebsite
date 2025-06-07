<?php

use App\Models\User;
use Livewire\Livewire;
use Modules\Profile\Models\Profile;
use Modules\Settings\Livewire\Components\Profile\Publish;

beforeEach(function () {
    // create a user and an associated profile
    $this->user = User::factory()->create();
    $this->profile = Profile::factory()->create([
        'user_id' => $this->user->id,
        'public' => false,
    ]);
    $this->actingAs($this->user);
});

it('mounts with the profile current visibility', function () {
    Livewire::test(Publish::class)
        ->assertSet('public', $this->profile->public)
        ->assertSet('profile.id', $this->profile->id);
});

it('renders the correct view', function () {
    Livewire::test(Publish::class)
        ->assertStatus(200);
});
