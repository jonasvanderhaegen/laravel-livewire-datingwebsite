<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
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
    $this->onboarding = new class($this->step) {
        public function __construct(private OnboardingStep $step)
        {
        }

        public function inProgress(): bool
        {
            return true;
        }

        public function steps(): Collection
        {
            return Collection::make([$this->step]);
        }
    };

    // 3) Fake a user that returns it
    $this->user = new class($this->onboarding) {
        public function __construct(private $onboarding)
        {
        }

        public function onboarding()
        {
            return $this->onboarding;
        }
    };

    $this->middleware = new RedirectToUnfinishedOnboardingStep();
});

it('passes through when the next step link matches the current request path', function () {
    $request = Request::create('/step-two', 'GET');
    $request->setUserResolver(fn() => $this->user);

    // Return a real Response
    $next = fn(Request $req) => new Response('ok', 200);

    $response = $this->middleware->handle($request, $next);

    expect($response)
        ->toBeInstanceOf(Response::class)
        ->getContent()->toBe('ok');
});

it('redirects to the next step when it is incomplete and path does not match', function () {
    $request = Request::create('/some-other', 'GET');
    $request->setUserResolver(fn() => $this->user);

    /** @var \Illuminate\Http\RedirectResponse $response */
    $response = $this->middleware->handle(
        $request,
        // Should never be called in this scenario:
        fn() => new Response('never')
    );

    // Assert it's a RedirectResponse and the URL ends with '/step-two'
    expect($response)
        ->toBeInstanceOf(\Illuminate\Http\RedirectResponse::class);

    $target = $response->getTargetUrl();
    expect(Str::endsWith($target, '/step-two'))->toBeTrue();
});
