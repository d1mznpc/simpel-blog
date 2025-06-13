@php
    use Illuminate\Support\Str;
@endphp

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

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Wrapper (Sidebar + Content) -->
    <div class="flex flex-1">

        <!-- Sidebar -->
        <aside class="w-64 h-screen sticky top-0 bg-white border-r border-blue-200 shadow-sm flex-shrink-0">
            <div class="px-6 py-6 border-b border-blue-100">
                <h1 class="text-2xl font-bold text-blue-700">Dimas<span class="font-light text-gray-500">Blog</span>
                </h1>
            </div>

            <nav class="flex flex-col px-4 py-4 space-y-2" x-data="{ open: false }">
                <!-- Index Post -->
                <a href="{{ route('posts.index') }}"
                    class="flex items-center px-4 py-2 border border-blue-500 text-blue-700 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-list mr-2"></i> Index Post
                </a>

                <!-- Create Post -->
                <a href="{{ route('posts.create') }}"
                    class="flex items-center px-4 py-2 border border-blue-500 text-blue-700 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-plus mr-2"></i> Create Post
                </a>
                
                <!-- About Post -->
                <a href="{{ route('about') }}"
                    class="flex items-center px-4 py-2 border border-blue-500 text-blue-700 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-user mr-2"></i> About
                </a>

                <!-- Show Post Dropdown -->
                <button @click="open = !open"
                    class="flex items-center justify-between px-4 py-2 border border-blue-500 text-blue-700 rounded hover:bg-blue-50 transition w-full">
                    <span class="flex items-center">
                        <i class="fas fa-eye mr-2"></i> Show Post
                    </span>
                    <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                </button>

                <!-- Dropdown Content -->
                <div x-show="open" x-transition
                    class="ml-4 mt-2 p-2 bg-white rounded shadow max-h-64 overflow-y-auto space-y-1 border border-blue-100">
                    @foreach ($allPosts as $post)
                        <a href="{{ route('posts.show', $post->id) }}"
                            class="block text-sm text-gray-800 hover:text-blue-600 hover:bg-blue-50 px-2 py-1 rounded transition">
                            {{ Str::limit($post->title, 30) }}
                        </a>
                    @endforeach
                </div>
            </nav>

        </aside>



        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            {{ $slot }}
        </main>
    </div>

    <!-- Footer -->
    <footer class="py-6 border-t text-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} DimasBlog. All rights reserved.</p>
        <p>Jika ada saran hubungi saja sosial media saya dibawah ini.</p>
        <div class="mt-2 space-x-4">
            <a href="https://github.com/d1mznpc" class="text-gray-700 hover:text-black" target="_blank" rel="noopener">
                <i class="fab fa-github fa-lg"></i>
            </a>
            <a href="https://instagram.com/d1mznpc" class="text-pink-600 hover:text-pink-700" target="_blank"
                rel="noopener">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
            <a href="https://wa.me/6283182357722?text=ini%20ada%20saran%20dari%20saya"
                class="text-lime-400 hover:text-lime-600" target="_blank" rel="noopener">
                <i class="fab fa-whatsapp fa-lg"></i>
            </a>
            <a href="mailto:dimasakuq@email.com" class="text-gray-700 hover:text-blue-600" target="_blank"
                rel="noopener">
                <i class="fas fa-envelope fa-lg"></i>
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
