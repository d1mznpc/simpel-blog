@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Create a New Post</h4>
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

                {{-- Form --}}
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title" class="fw-semibold">Title</label>
                        <input type="text" name="title" id="title" 
                               class="form-control border-primary" 
                               value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="content" class="fw-semibold">Content</label>
                        <textarea name="content" id="content" rows="5" 
                                  class="form-control border-primary" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
