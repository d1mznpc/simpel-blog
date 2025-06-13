<div>
    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show" x-transition class="max-w-6xl mx-auto mt-4">
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded relative flex justify-between items-start"
                role="alert">
                <div>
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-green-700 hover:text-green-900 ml-4">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 8.586l4.95-4.95a1 1 0 111.414 1.414L11.414 10l4.95 4.95a1 1 0 01-1.414 1.414L10 11.414l-4.95 4.95a1 1 0 01-1.414-1.414L8.586 10l-4.95-4.95A1 1 0 115.05 3.636L10 8.586z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Header --}}
    <div class="max-w-6xl mx-auto mt-8 border-b border-gray-300 pb-4 mb-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h3 class="text-2xl font-semibold text-blue-700 flex items-center">
                <i class="fas fa-list mr-2"></i> List Post
            </h3>

            <div class="flex gap-2 w-full md:w-auto">
                <input type="text" wire:model.debounce.500ms="search" placeholder="Search blog..."
                    class="w-full md:w-64 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 text-sm">
                <a href="{{ route('posts.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i> Create
                </a>
            </div>
        </div>
    </div>

    {{-- Post Cards --}}
    @if ($posts->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white shadow rounded-lg overflow-hidden flex flex-col h-full">
                    {{-- Image + title = link --}}
                    <a href="{{ route('posts.show', $post->id) }}">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-48 object-cover aspect-[3/2]">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                <i class="fas fa-image text-4xl"></i>
                            </div>
                        @endif
                    </a>

                    <div class="p-4 flex flex-col justify-between flex-grow">
                        <div class="space-y-1">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <h3 class="text-lg font-semibold text-blue-800">{{ $post->title }}</h3>
                            </a>
                            <p class="text-xs text-gray-400">Created: {{ $post->created_at->format('d M Y') }}</p>
                        </div>

                        <div class="flex gap-2 mt-3">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="inline-flex items-center px-3 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition text-xs">
                                <i class="fas fa-pencil-alt mr-1"></i> Edit
                            </a>
                            <button onclick="confirmDelete({{ $post->id }})"
                                class="inline-flex items-center px-3 py-1 text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition text-xs">
                                <i class="fas fa-trash mr-1"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-blue-100 text-blue-800 p-4 rounded shadow text-sm mt-6">
            <i class="fas fa-info-circle mr-2"></i> Post not found. <a href="{{ route('posts.create') }}"
                class="text-blue-600 hover:underline">Create your first post</a>.
        </div>
    @endif
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this post?')) {
            window.location.href = `/posts/${id}/delete`;
        }
    }
</script>
