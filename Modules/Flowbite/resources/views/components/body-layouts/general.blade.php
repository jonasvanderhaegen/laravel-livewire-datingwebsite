<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script>
            (() => {
                let dark = localStorage.getItem('darkMode');
                if (dark === null) {
                    // first-time visitor: use OS preference
                    dark = window.matchMedia(
                        '(prefers-color-scheme: dark)',
                    ).matches;
                } else {
                    dark = JSON.parse(dark);
                }

                console.log(dark);

                if (dark) {
                    document.documentElement.classList.add('dark');
                }
            })();
        </script>
        <meta
            http-equiv="Content-Security-Policy"
            content="upgrade-insecure-requests"
        />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title>
            {{ config('app.name') }}{{ isset($title) ? ' | '.$title : '' }}
        </title>

        <meta name="description" content="{{ $description ?? '' }}" />
        <meta name="keywords" content="{{ $keywords ?? '' }}" />
        <meta name="author" content="{{ $author ?? '' }}" />

        @stack('css')

        @livewireStyles
        {{-- Vite CSS --}}
        @vite(['resources/css/app.css'])
    </head>

    <body
        class="bg-slate-50 font-sans text-gray-700 text-slate-900 antialiased dark:bg-slate-900 dark:text-slate-50"
    >
        @php
            $links = [
                __('home') => 'flowbite.home',
            ];
        @endphp

        <x-flowbite::body-partials.default-header-navigation :links="$links" />

        {{ $slot }}

        <x-flowbite::body-partials.default-footer-section />

        @livewireScripts
        {{-- Vite JS --}}
        @vite(['resources/ts/app.ts'])

        @stack('scripts')
    </body>
</html>
