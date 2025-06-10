@extends('layout')

@section('content')

{{-- Header --}}
<header class="bg-primary text-white py-4 shadow-sm mb-5">
    <div class="container">
        <h1 class="mb-0">DimasBlog</h1>
    </div>
</header>

{{-- Konten Blog --}}
<div class="container mb-5">
    <article class="card shadow-sm border-0">
        <div class="card-body bg-white">
            <h2 class="text-primary mb-3">{{ $post->title }}</h2>
            <p class="text-muted fst-italic mb-4">Dibuat pada: {{ $post->created_at->format('d M Y') }}</p>
            
            <div class="mb-4" style="line-height: 1.7; font-size: 1.1rem;">
                {!! nl2br(e($post->content)) !!}
            </div>
            
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Post
            </a>
        </div>
    </article>
</div>

{{-- Footer --}}
<footer class="bg-light border-top py-3 text-center text-muted">
    <div class="container">
        <small>&copy; {{ date('Y') }} DimasBlog. All rights reserved.</small>
        <div class="mt-2">
            <a href="https://github.com/d1mznpc" class="text-primary me-3" title="GitHub" target="_blank" rel="noopener">
                <i class="fab fa-github fa-lg"></i>
            </a>
            <a href="https://instagram.com/d1mznpc" class="text-primary" title="Instagram" target="_blank" rel="noopener">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
        </div>
    </div>
</footer>


@endsection
