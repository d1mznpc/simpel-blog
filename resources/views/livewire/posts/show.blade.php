
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
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                    </div>
                </article>
            </main>
        </div>
    </div>

