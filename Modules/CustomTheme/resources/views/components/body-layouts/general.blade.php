<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            html, body {
                overscroll-behavior-y: none;
            }
        </style>
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
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
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
            ' font-sans text-slate-900 antialiased dark:text-slate-50',
            $isMobile ?? false ? 'min-h-screen bg-white pb-27 dark:bg-slate-950' : 'overflow-x-clip relative max-w-screen bg-blue-950',
        ])
    >
        @php
            $links = [
                __('home') => 'home',
                __('Terms & conditions') => 'terms-and-conditions',
            ];
        @endphp

        @unless ($isMobile ?? false)
            <x-customtheme::top />
        @endunless

        <x-customtheme::body-partials.header :links="$links" />

        {{ $slot }}

        @if ($isMobile ?? false)
            <livewire:customtheme::components.body-partials.mobile-bottom-menu />
        @else
            <x-customtheme::body-partials.footer />
            <x-customtheme::bottom />
        @endif

        @livewireScripts
        {{-- Vite JS --}}
        @vite(['resources/ts/app.ts'])

        @stack('scripts')

        <x-toaster-hub />
    </body>
</html>
