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
        x-cloak
        x-data="{
            showDocsNavigation: false,
            scrolled: window.scrollY > 50,
            width: window.innerWidth,
            get showPlatformSwitcherHeader() {
                return ! this.scrolled && this.width >= 1024
            },
        }"
        x-resize="
            width = $width
            if (width >= 1024) showDocsNavigation = false
        "
        x-init="
            window.addEventListener('scroll', () => {
                scrolled = window.scrollY > 50
            })
        "
        x-effect="
            if (showDocsNavigation) {
                document.body.style.overflow = 'hidden'
            } else {
                document.body.style.overflow = ''
            }
        "
        @class([
            'min-h-screen overflow-x-clip bg-white font-sans text-slate-900 antialiased dark:bg-slate-950 dark:text-slate-50',
            'pb-27' => $isMobile ?? false,
        ])
    >
        @php
            $links = [
                __('home') => 'home',
                __('Terms & conditions') => 'terms-and-conditions',
            ];
        @endphp

        <x-customtheme::body-partials.header :links="$links" />

        {{ $slot }}

        @if ($isMobile ?? false)
            <livewire:customtheme::components.body-partials.mobile-bottom-menu />
        @else
            <x-customtheme::body-partials.footer />
        @endif

        @livewireScripts
        {{-- Vite JS --}}
        @vite(['resources/ts/app.ts'])

        @stack('scripts')

        <x-toaster-hub />
    </body>
</html>
