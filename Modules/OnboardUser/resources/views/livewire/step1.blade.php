<x-onboarduser::layouts.master>
    <div class="mb-10 flex justify-between text-white">
        <button
            class="cursor-not-allowed rounded-full bg-gray-500 px-8 py-4 opacity-50"
        >
            Previous
        </button>
        <button
            wire:click="goNextStep"
            @disabled(! $this->nextStepAvailable())
            @class([
                'rounded-full px-8 py-4',
                $this->nextStepAvailable() ? 'cursor-pointer bg-blue-500' : 'cursor-not-allowed bg-red-500 opacity-50',
            ])
        >
            Next
        </button>
    </div>

    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.account.location-component')
    </div>
</x-onboarduser::layouts.master>
