<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">

        <div class="bg-background flex min-h-svh flex-col items-center justify-center p-6 md:p-10">

            <div class="w-full max-w-6xl mx-auto">

                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium mb-6" wire:navigate>
                    <span class="flex h-30 w-30 items-center justify-center rounded-md">
                        <x-app-logo-icon class="size-30 fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'PSA') }}</span>
                </a>

                <div class="bg-white dark:bg-neutral-900 shadow-xl rounded-xl p-8">
                    {{ $slot }}
                </div>

            </div>

        </div>

        @fluxScripts
    </body>
</html>