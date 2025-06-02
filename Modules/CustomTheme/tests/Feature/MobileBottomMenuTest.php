<?php

declare(strict_types=1);

use Livewire\Livewire;
use Modules\CustomTheme\Livewire\Components\BodyPartials\MobileBottomMenu;

it('renders MobileBottomMenu component successfully', function () {

    Livewire::test(MobileBottomMenu::class)
        ->assertStatus(200);
});
