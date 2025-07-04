<x-guest-layout>
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            <!-- Logo MENOSS -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets/logo-menoss.png') }}" alt="Menoss Logo" class="w-40">
            </div>
            <h2 class="text-2xl font-bold text-center text-red-700 mb-6">Bienvenido a Menoss</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Correo electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-red-700" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-red-700 hover:bg-red-800">
                        {{ __('Ingresar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</x-guest-layout>
