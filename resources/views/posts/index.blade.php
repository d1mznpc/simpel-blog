@extends('layout')
@if (session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0"><i class="fas fa-list me-2 text-primary"></i>Daftar Postingan</h3>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Buat Post Baru
            </a>
        </div>

        @if ($posts->count())
            <div class="table-responsive">
                <table class="table table-bordered align-middle bg-white shadow-sm">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Judul Blog</th>
                            <th style="width: 180px;">Tanggal Dibuat</th>
                            <th style="width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="text-dark fw-semibold">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>{{ $post->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-outline-danger delete-button">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info shadow-sm">
                <i class="fas fa-info-circle me-2"></i> Belum ada post yang tersedia.
            </div>
        @endif
    </div>
@endsection
