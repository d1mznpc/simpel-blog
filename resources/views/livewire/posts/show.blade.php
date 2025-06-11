<div>
    <div>
        {{-- Header --}}
        <header class="bg-blue-600 text-white py-6 shadow">
            <div class="max-w-6xl mx-auto px-4">
                <h1 class="text-3xl font-bold">Dimas<span class="font-light">Blog</span></h1>
            </div>
        </header>

        {{-- Konten --}}
        <main class="max-w-4xl mx-auto mt-10 px-4">
            <article class="bg-white shadow-lg rounded-xl p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-4">{{ $post->title }}</h2>
                <p class="text-sm text-gray-500 italic mb-6">
                    <i class="fa-regular fa-calendar mr-1"></i>
                    {{ $post->created_at->format('d M Y') }}
                </p>

                <div class="prose prose-lg max-w-none text-gray-700">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="mt-8">
                    <a href="{{ route('posts.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Back To List
                    </a>
                </div>
            </article>
        </main>
        {{-- FAQ Section --}}
        <section x-data="{ selected: null }" class="mt-10 bg-white p-6 rounded-lg shadow max-w-6xl mx-auto">
            <h3 class="text-xl font-bold text-blue-700 mb-6 text-center">FAQ</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- FAQ 1 --}}
                <div class="border p-4 rounded-lg">
                    <button @click="selected !== 1 ? selected = 1 : selected = null"
                        class="flex justify-between w-full text-left text-sm font-medium text-gray-700 hover:text-blue-700 focus:outline-none">
                        <span>Ini blog serius atau iseng doang?</span>
                        <svg :class="selected === 1 ? 'transform rotate-180' : ''"
                            class="h-5 w-5 text-gray-500 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="selected === 1" x-collapse class="mt-2 text-gray-600 text-sm">
                        Awalnya iseng, lama-lama jadi tempat belajar coding juga hehe.
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="border p-4 rounded-lg">
                    <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="flex justify-between w-full text-left text-sm font-medium text-gray-700 hover:text-blue-700 focus:outline-none">
                        <span>Apakah ini blog atau tempat curhat?</span>
                        <svg :class="selected === 2 ? 'transform rotate-180' : ''"
                            class="h-5 w-5 text-gray-500 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="selected === 2" x-collapse class="mt-2 text-gray-600 text-sm">
                        Kadang keduanya. Tapi tenang, curhatnya tetap pakai validasi data. Mwehehe.
                    </div>
                </div>

                {{-- FAQ 3 --}}
                <div class="border p-4 rounded-lg">
                    <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="flex justify-between w-full text-left text-sm font-medium text-gray-700 hover:text-blue-700 focus:outline-none">
                        <span>Bisa request fitur atau tanya seputar proyek ini?</span>
                        <svg :class="selected === 2 ? 'transform rotate-180' : ''"
                            class="h-5 w-5 text-gray-500 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="selected === 2" x-collapse class="mt-2 text-gray-600 text-sm">
                        Tentu! Silakan hubungi saya lewat kontak yang tersedia di halaman bawah.
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="border p-4 rounded-lg">
                    <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="flex justify-between w-full text-left text-sm font-medium text-gray-700 hover:text-blue-700 focus:outline-none">
                        <span>Ngoding nya pake apa?</span>
                        <svg :class="selected === 2 ? 'transform rotate-180' : ''"
                            class="h-5 w-5 text-gray-500 transition-transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="selected === 2" x-collapse class="mt-2 text-gray-600 text-sm">
                        Saya menggunakan Laravel 12 untuk backend, Tailwind CSS untuk desain, Font Awesome buat ikon, SweetAlert2 untuk notifikasi interaktif, dan Alpine.js untuk animasi ringan seperti toggle FAQ.
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
