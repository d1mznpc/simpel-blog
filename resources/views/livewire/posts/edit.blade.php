<div>
    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Post</h5>
            </div>

            <div class="card-body bg-white">
                {{-- Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form Livewire --}}
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Judul</label>
                        <input type="text" wire:model.defer="title" id="title"
                            class="form-control border-primary" required>
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">Konten</label>
                        <textarea wire:model.defer="content" id="content" class="form-control border-primary" rows="6" required></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
