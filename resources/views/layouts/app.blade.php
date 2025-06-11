<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Main Content -->
    <main class="flex-grow container mx-auto py-6 px-4">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="py-6 border-t text-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} DimasBlog. All rights reserved. <p>Jika ada saran hubungi saja sosial media saya dibawah ini.</p></p>
        <div class="mt-2 space-x-4">
            <a href="https://github.com/d1mznpc" class="text-gray-700 hover:text-black" target="_blank" rel="noopener">
                <i class="fab fa-github fa-lg"></i>
            </a>
            <a href="https://instagram.com/d1mznpc" class="text-pink-600 hover:text-pink-700" target="_blank" rel="noopener">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
            <a href="https://wa.me/6283182357722?text=ini%20ada%20saran%20dari%20saya" class="text-lime-400 hover:text-lime-600" target="_blank" rel="noopener">
                <i class="fab fa-whatsapp fa-lg"></i>
            </a>
            <a href="mailto:dimasakuq@email.com" class="text-gray-700 hover:text-blue-600" target="_blank" rel="noopener">
                <i class="fas fa-envelope mr-1"></i>
            </a>
        </div>
    </footer>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Delete Confirmation -->
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.Livewire.dispatch('deletePostConfirmed', {
                        id: id
                    });
                }
            });
        }
    </script>

    <!-- Flash Message -->
    <script>
        @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
        @endif

        @if (session('deleted'))
        Swal.fire({
            icon: 'error',
            title: 'Dihapus!',
            text: '{{ session('deleted') }}',
            background: '#f8d7da',
            color: '#842029',
            showConfirmButton: false,
            timer: 2000
        });
        @endif
    </script>

    <!-- Livewire Scripts -->
    @livewireScripts

</body>

</html>
