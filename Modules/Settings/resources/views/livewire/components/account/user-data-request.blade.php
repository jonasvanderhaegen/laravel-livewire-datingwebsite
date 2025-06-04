<x-settings::action-section>
    <x-slot name="title">
        {{ __('User data request') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Curious how many times you liked?') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            <span class="font-bold text-orange-400 dark:text-orange-300">
                {{ __('form.email') }}: {{ auth()->user()->email }}
            </span>
            <br />
            {{ __('Door op Versturen te klikken, bevestig ik dat ik de eigenaar ben van het bovenstaande e-mailadres en stem ik in met het downloaden van mijn gegevens. Hiermee neem ik alle risico\'s en aansprakelijkheid voor dergelijke gedownloade gegevens op me.') }}
        </div>

        <div class="mt-5 flex justify-end">
            <x-settings::button>
                {{ __('request') }}
            </x-settings::button>
        </div>
    </x-slot>
</x-settings::action-section>
