<?php

declare(strict_types=1);

use Livewire\Livewire;
use Modules\Flowbite\Livewire\Components\BodyPartials\MobileBottomMenu;

it('renders MobileBottomMenu component successfully', function () {

    Livewire::test(MobileBottomMenu::class)
        ->assertStatus(200);
});
