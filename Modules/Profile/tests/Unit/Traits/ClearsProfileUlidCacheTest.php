<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Cache;
use Modules\Profile\Concerns\ClearsProfileUlidCache;

beforeEach(function () {
    Cache::clear();
});

it('forgets the profile.ulid cache when profile_id is truthy', function () {
    // Arrange
    $ulid = '01ARZ3NDEKTSV4RRFFQ69G5FAV';
    $cacheKey = "profile.route.ulid.{$ulid}";
    Cache::put($cacheKey, 'dummy', 60);

    // stub that exposes clearProfile via a public method
    $pivot = new class {
        use ClearsProfileUlidCache;

        public int $profile_id = 123;

        protected function getProfileUlid(): string
        {
            return '01ARZ3NDEKTSV4RRFFQ69G5FAV';
        }

        // public wrapper so we can call the protected clearProfile()
        public function runClear(): void
        {
            $this->clearProfile();
        }
    };

    expect(Cache::has($cacheKey))->toBeTrue();

    // Act
    $pivot->runClear();

    // Assert
    expect(Cache::has($cacheKey))->toBeFalse();
});

it('does nothing when profile_id is falsy', function () {
    // Arrange
    $otherKey = 'profile.route.ulid.SOMETHING_ELSE';
    Cache::put($otherKey, 'keep-me', 60);

    $pivot = new class {
        use ClearsProfileUlidCache;

        public ?int $profile_id = null;

        protected function getProfileUlid(): string
        {
            return 'SOMETHING_ELSE';
        }

        public function runClear(): void
        {
            $this->clearProfile();
        }
    };

    expect(Cache::has($otherKey))->toBeTrue();

    // Act
    $pivot->runClear();

    // Assert
    expect(Cache::has($otherKey))->toBeTrue();
});
