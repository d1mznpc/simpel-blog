<div>
    <div class="max-w-2xl mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
                <h5 class="text-lg font-semibold"><i class="fas fa-edit mr-2"></i> Edit Post</h5>
            </div>

            <div class="px-6 py-4">
                {{-- Error Validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form Livewire --}}
                <form wire:submit.prevent="update" class="space-y-4" enctype="multipart/form-data">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" wire:model.defer="title" id="title"
                            class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                            required>
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Change Image</label>
                        <input type="file" wire:model.defer="newImage" id="image"
                            class="mt-1 block w-full text-sm text-gray-700 border border-blue-300 rounded-md shadow-sm cursor-pointer focus:outline-none focus:ring-blue-500 focus:border-blue-500 p-2"
                            accept="image/*">
                    </div>

                    {{-- Image Preview --}}
                    @if ($newImage)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">New Image Preview:</label>
                            <img src="{{ $newImage->temporaryUrl() }}" class="h-40 object-contain rounded shadow border border-gray-200">
                        </div>
                    @elseif ($image)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Current Image:</label>
                            <img src="{{ asset('storage/' . $image) }}" class="h-40 object-contain rounded shadow border border-gray-200">
                        </div>
                    @endif

                    {{-- Content --}}
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea wire:model.defer="content" id="content" rows="6"
                            class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                            required></textarea>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-between items-center pt-4">
                        <a href="{{ route('posts.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 text-sm font-medium rounded hover:bg-blue-100 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
