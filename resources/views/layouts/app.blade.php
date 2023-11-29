<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Xue Tejidos') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto lg:px-8 lg:py-9">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        livewire.on('alert', function(message) {
            Swal.fire(
                'Buen trabajo!',
                message,
                'success'
            )
        })
    </script>
    <script>
        window.addEventListener('delete', event => {
            const userId = event.detail.userId;

            Swal.fire({
                title: "¿Deseas eliminar este usuario?",
                text: "Esta acción no se puede revertir",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteUser', userId);
                    Swal.fire({
                        title: "Confirmado",
                        text: "El usuario ha sido eliminado correctamente",
                        icon: "success"
                    });
                }
            });
        });
    </script>
</body>

</html>
