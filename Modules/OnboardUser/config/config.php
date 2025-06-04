<?php

declare(strict_types=1);

return [
    'name' => 'OnboardUser',
    'onboarding_steps' => [
        'location' => false,
        'profile' => false,
    ],
    'steps' => [
        'location' => [
            'label' => 'Where are you?',
            'route' => '/onboarding/step-1',
            'cta' => 'Let’s go',
            'complete' => 'location',
        ],
        'profile' => [
            'label' => 'Your Profile',
            'route' => '/onboarding/step-2',
            'cta' => 'Next',
            'complete' => 'profile',
        ],
        'final' => [
            'label' => 'Final step',
            'route' => '/onboarding/final',
            'cta' => 'Finish',
            'complete' => 'final',
        ],
    ],
];
