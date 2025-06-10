<div class="container mt-5">
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">Dibuat pada: {{ $post->created_at->format('d M Y') }}</p>
    <div class="mb-3">
        {!! nl2br(e($post->content)) !!}
    </div>
    <a href="{{ url('/posts') }}" class="btn btn-secondary">Kembali ke Daftar Post</a>
</div>