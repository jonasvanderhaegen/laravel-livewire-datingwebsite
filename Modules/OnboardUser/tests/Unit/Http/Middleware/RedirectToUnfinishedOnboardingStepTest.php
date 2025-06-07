<?php

declare(strict_types=1);

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\OnboardUser\Http\Middleware\RedirectToUnfinishedOnboardingStep;
use Spatie\Onboard\OnboardingStep;

beforeEach(function () {
    // 1) Mock a single onboarding step
    $this->step = Mockery::mock(OnboardingStep::class);
    $this->step
        ->shouldReceive('notExcluded')->andReturnTrue()
        ->shouldReceive('incomplete')->andReturnTrue()
        ->shouldReceive('attribute')->with('link')->andReturn('/step-two');

    // 2) Fake an onboarding object
    $this->onboarding = new class($this->step)
    {
        public function __construct(private readonly OnboardingStep $step) {}

        public function inProgress(): bool
        {
            return true;
        }

        public function steps(): Collection
        {
            return Collection::make([$this->step]);
        }
    };

    // 3) Stub a “user” that just returns the onboarding instance
    $this->user = new class($this->onboarding)
    {
        public function __construct(private readonly object $onboarding) {}

        public function onboarding(): object
        {
            return $this->onboarding;
        }
    };

    $this->middleware = new RedirectToUnfinishedOnboardingStep();
});

it('passes through when the next-step link matches the current path', function () {
    $request = Request::create('/step-two', 'GET');
    $request->setUserResolver(fn () => $this->user);

    $next = fn (Request $req) => new Response('ok', 200);
    $response = $this->middleware->handle($request, $next);

    expect($response)
        ->toBeInstanceOf(Response::class)
        ->getContent()->toBe('ok');
});

it('redirects when the next step is incomplete and the path differs', function () {
    $request = Request::create('/some-other', 'GET');
    $request->setUserResolver(fn () => $this->user);

    /** @var RedirectResponse $response */
    $response = $this->middleware->handle(
        $request,
        fn () => new Response('never') // should never be hit
    );

    expect($response)->toBeInstanceOf(RedirectResponse::class);

    $target = $response->getTargetUrl();
    expect(Str::endsWith($target, '/step-two'))->toBeTrue();
});
