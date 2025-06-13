<div class="space-y-4">
    @if (session('error'))
        <div class="text-red-500">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif

    <input type="file" wire:model="image" accept="image/*">

    @if ($image)
        <p>Preview:</p>
        <img src="{{ $image->temporaryUrl() }}" class="w-64 rounded-md shadow">
    @endif

    <button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded">Upload</button>
</div>
