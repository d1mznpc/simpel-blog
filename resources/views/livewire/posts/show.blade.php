<div>
    {{-- Konten --}}
    <main class="max-w-6xl mx-auto mt-10 px-4">
        <div class="bg-white shadow-lg rounded-xl p-6 md:p-8">
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
        </div>
    </main>

    {{-- FAQ Section --}}
    <section x-data="{ selected: null }" class="mt-10 max-w-6xl mx-auto px-4">
        <div class="bg-white shadow-lg rounded-xl p-6 md:p-8">
            <h3 class="text-xl font-bold text-blue-700 mb-6 text-center">FAQ</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- FAQ Items --}}
                @php
                    $faqs = [
                        [
                            'id' => 1,
                            'question' => 'Ini blog serius atau iseng doang?',
                            'answer' => 'Awalnya iseng, lama-lama jadi tempat belajar coding juga hehe.',
                        ],
                        [
                            'id' => 2,
                            'question' => 'Apakah ini blog atau tempat curhat?',
                            'answer' => 'Kadang keduanya. Tapi tenang, curhatnya tetap pakai validasi data. Mwehehe.',
                        ],
                        [
                            'id' => 3,
                            'question' => 'Bisa request fitur atau tanya seputar proyek ini?',
                            'answer' => 'Tentu! Silakan hubungi saya lewat kontak yang tersedia di halaman bawah.',
                        ],
                        [
                            'id' => 4,
                            'question' => 'Ngoding nya pake apa?',
                            'answer' =>
                                'Saya menggunakan Laravel 12 untuk backend, Tailwind CSS untuk desain, Font Awesome buat ikon, SweetAlert2 untuk notifikasi interaktif, dan Alpine.js untuk animasi ringan seperti toggle FAQ.',
                        ],
                    ];
                @endphp

                @foreach ($faqs as $faq)
                    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                        <button
                            @click="selected !== {{ $faq['id'] }} ? selected = {{ $faq['id'] }} : selected = null"
                            class="flex justify-between w-full text-left text-sm font-medium text-gray-700 hover:text-blue-700 focus:outline-none">
                            <span>{{ $faq['question'] }}</span>
                            <svg :class="selected === {{ $faq['id'] }} ? 'transform rotate-180' : ''"
                                class="h-5 w-5 text-gray-500 transition-transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="selected === {{ $faq['id'] }}" x-collapse class="mt-2 text-gray-600 text-sm">
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
