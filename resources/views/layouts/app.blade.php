<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tienda MENOSS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind y Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <!-- Layout principal: flex, columna, 100% alto -->
    <body class="font-sans antialiased min-h-screen flex flex-col">
        <style>
            /* Para 5 tarjetas exactas por fila en escritorio */
            @media (min-width: 1200px) {
                .custom-col {
                    flex: 0 0 20%;
                    max-width: 20%;
                }
            }
            .hover-shadow:hover { box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.10)!important; }
        </style>
        <!-- Contenido principal crece para empujar el footer abajo -->
        <div class="flex-grow">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        <!-- Footer Bootstrap -->
        <footer class="bg-dark text-light mt-5 pt-4 pb-2">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-3">Contáctanos</h5>
                        <ul class="list-unstyled mb-2">
                            <li class="mb-2">
                                <i class="bi bi-envelope-fill me-2"></i>
                                <a href="mailto:serviciocliente@menoss.pe" class="text-light text-decoration-underline">serviciocliente@menoss.pe</a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <a href="tel:019999999" class="text-light text-decoration-underline">(01) 999 9999</a>
                            </li>
                            <li>
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                <a href="#" class="text-light text-decoration-underline">Ver tiendas</a>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <a href="#" class="text-light me-3 fs-4"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-light me-3 fs-4"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-light me-3 fs-4"><i class="bi bi-whatsapp"></i></a>
                            <a href="#" class="text-light fs-4"><i class="bi bi-tiktok"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6 class="fw-bold">Nosotros</h6>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Conócenos</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Responsabilidad social</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Nuestras tiendas</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Ventas corporativas</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6 class="fw-bold">Atención al cliente</h6>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Tutorial de compra</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Horarios de atención</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Preguntas frecuentes</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Cambios y devoluciones</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6 class="fw-bold">Políticas</h6>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Datos personales</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Privacidad</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Promociones</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Términos y condiciones</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="border-secondary mt-4 mb-2">
                <div class="text-center small">
                    &copy; {{ date('Y') }} Menoss. Todos los derechos reservados.
                </div>
            </div>
        </footer>
        <!-- Bootstrap JS (Popper incluido) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
    </body>
</html>
