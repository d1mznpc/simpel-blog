@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Post</h5>
            </div>

            <div class="card-body bg-white">
                {{-- Tampilkan Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form Edit --}}
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Judul</label>
                        <input type="text" name="title" id="title" class="form-control border-primary" 
                               value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">Konten</label>
                        <textarea name="content" id="content" class="form-control border-primary" 
                                  rows="6" required>{{ old('content', $post->content) }}</textarea>
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
@endsection
