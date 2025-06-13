<div>
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <h3 class="text-2xl font-semibold text-blue-700 flex items-center">
            <i class="fas fa-list mr-2"></i> List Post
        </h3>

        <a href="{{ route('posts.create') }}"
            class="inline-flex items-center px-3 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md text-sm transition">
            <i class="fas fa-plus mr-1"></i> Create New Post
        </a>
    </div>
    <hr>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-3">
        @foreach ($posts as $post)
            <div class="bg-white shadow rounded-lg overflow-hidden flex flex-col h-full">
                <a href="{{ route('posts.show', $post->id) }}">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
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
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this post?')) {
            window.location.href = `/posts/${id}/delete`;
        }
    }
</script>
