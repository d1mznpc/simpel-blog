<div>
    <div>
        <div class="max-w-6xl mx-auto mt-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-blue-700 flex items-center">
                    <i class="fas fa-list mr-2"></i> List Post
                </h3>
                <a href="{{ route('posts.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i> Create New Post
                </a>
            </div>

            @if ($posts->count())
                <div class="overflow-x-auto bg-white shadow rounded-lg">
                    <table class="min-w-full table-auto border border-gray-200">
                        <thead class="bg-blue-100 text-left text-gray-700 text-sm">
                            <tr>
                                <th class="px-4 py-3 border-b">No</th>
                                <th class="px-4 py-3 border-b">Title</th>
                                <th class="px-4 py-3 border-b">Date Created</th>
                                <th class="px-4 py-3 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-800">
                            @foreach ($posts as $index => $post)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('posts.show', $post->id) }}"
                                            class="text-blue-700 font-medium hover:underline">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-2">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="px-4 py-2 flex gap-2">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="inline-flex items-center px-3 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition text-xs">
                                            <i class="fas fa-pencil-alt mr-1"></i> Edit
                                        </a>
                                        <button onclick="confirmDelete({{ $post->id }})"
                                            class="inline-flex items-center px-3 py-1 text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition text-xs">
                                            <i class="fas fa-trash mr-1"></i> Remove
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-blue-100 text-blue-800 p-4 rounded shadow text-sm mt-6">
                    <i class="fas fa-info-circle mr-2"></i> Belum ada post yang tersedia.
                </div>
            @endif
        </div>
    </div>
</div>
