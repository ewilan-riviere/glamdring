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
                                <x-app.button type="submit">
                                    Sign in
                                </x-app.button>
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
