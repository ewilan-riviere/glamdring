<x-guest-layout>
    <div class="flex min-h-screen">
        <div
            class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <x-icon.glamdring class="h-12 w-auto" />
                            <h1 class="font-aniron text-4xl">
                                Glamdring
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <x-slot name="logo">
                        <x-jet-authentication-card-logo />
                    </x-slot>

                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-6">
                        <form method="POST"
                            action="{{ route('login') }}"
                            class="space-y-6">
                            @csrf
                            <x-field.text label="Email address"
                                name="email"
                                type="email"
                                value="{{ config('app.env') === 'local' ? config('app.admin.email') : '' }}"
                                required />
                            <x-field.text label="Password"
                                name="password"
                                type="password"
                                value="{{ config('app.env') === 'local' ? config('app.admin.password') : '' }}"
                                required />

                            <div class="flex items-center justify-between">
                                <x-field.checkbox name="remember-me"
                                    label="Remember me"
                                    checked="{{ config('app.env') === 'local' }}" />

                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                        <a class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-500 dark:hover:text-indigo-400"
                                            href="{{ route('password.request') }}">
                                            Forgot your password?
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <x-button type="submit">
                                    Sign in
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 h-full w-full object-cover"
                src="{{ asset('images/shire.webp') }}"
                alt="The Shire">
        </div>
    </div>
</x-guest-layout>

{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST"
            action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email"
                    value="{{ __('Email') }}" />
                <x-jet-input id="email"
                    class="mt-1 block w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password"
                    value="{{ __('Password') }}" />
                <x-jet-input id="password"
                    class="mt-1 block w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />
            </div>

            <div class="mt-4 block">
                <label for="remember_me"
                    class="flex items-center">
                    <x-jet-checkbox id="remember_me"
                        name="remember" />
                    <span
                        class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
