<a
    href="{{ route('home') }}"
    wire:navigate.hover
    class="group relative z-30 flex flex-col items-center justify-center gap-x-3 gap-y-2.5 bg-blue-500 px-5 py-3 md:flex-row"
>
    <div class="flex items-center justify-center gap-3">
        {{-- Text --}}
        <div
            class="transition duration-200 ease-in-out will-change-transform group-hover:-translate-x-1"
        >
            <div
                class="bg-clip-text tracking-tight text-transparent"
                style="
                    background-image: linear-gradient(
                        90deg,
                        white 0%,
                        #f6ad55 35%,
                        white 70%
                    );
                    background-size: 200% 100%;
                    animation: shine 2s linear infinite;
                "
            >
                {{ __('Join our Early Access Program') }}
            </div>
        </div>
        {{-- Arrow --}}
        <x-customtheme::icons.right-arrow
            class="size-3 shrink-0 text-white transition duration-200 ease-in-out will-change-transform group-hover:translate-x-0.5"
        />
    </div>

    {{-- Countdown --}}
    <div
        x-data="countdown('2025-06-31T23:59:59')"
        class="flex items-center gap-1 rounded-lg px-2.5 py-1 text-sm text-white ring-1 ring-white/45 md:text-base"
    >
        <div class="pr-1 opacity-70">Ends in</div>
        <div class="flex min-w-8 justify-center gap-0.5">
            <number-flow x-ref="dd"></number-flow>
            <div class="pt-px text-sm opacity-70 md:pt-[3px]">d</div>
        </div>
        <div>:</div>
        <div class="flex min-w-8 justify-center gap-0.5">
            <number-flow x-ref="hh"></number-flow>
            <div class="pt-px text-sm opacity-70 md:pt-[3px]">h</div>
        </div>
        <div>:</div>
        <div class="flex min-w-8 justify-center gap-0.5">
            <number-flow x-ref="mm"></number-flow>
            <div class="pt-px text-sm opacity-70 md:pt-[3px]">m</div>
        </div>
        <div>:</div>
        <div class="flex min-w-8 justify-center gap-0.5">
            <number-flow x-ref="ss"></number-flow>
            <div class="pt-px text-sm opacity-70 md:pt-[3px]">s</div>
        </div>
    </div>
</a>
