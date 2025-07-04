<x-guest-layout>
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <!-- Logo MENOSS -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/logo-menoss.png') }}" alt="Menoss Logo" class="w-40">
        </div>
        <h2 class="text-2xl font-bold text-center text-red-700 mb-6">Crea tu cuenta en Menoss</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-red-700" href="{{ route('login') }}">
                    ¿Ya tienes cuenta? Ingresar
                </a>

                <x-primary-button class="ml-3 bg-red-700 hover:bg-red-800">
                    Registrarse
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
