<!-- resources/views/layouts/navigation.blade.php -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo MENOSS -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <span class="font-bold text-2xl text-red-600">MENOSS</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        Inicio
                    </x-nav-link>
                    <x-nav-link :href="url('/productos')" :active="request()->is('productos*')">
                        Productos
                    </x-nav-link>
                    <x-nav-link :href="url('/carrito')" :active="request()->is('carrito*')">
                        Carrito
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown (igual que antes) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" ...></svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Mi Perfil
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Salir
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-red-600">Ingresar</a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-red-600">Registrarse</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger menú para móvil igual que antes -->
            <div class="-me-2 flex items-center sm:hidden">
                <!-- ... igual que tu código ... -->
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (igual que tu código, solo cambia los textos de los links) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                Inicio
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/productos')" :active="request()->is('productos*')">
                Productos
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/carrito')" :active="request()->is('carrito*')">
                Carrito
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Mi Perfil
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Salir
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
                <div class="flex flex-col px-4 space-y-2">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-red-600">Ingresar</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-red-600">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
