<form method="POST" action="{{ route('post.clap', $post) }}">
    @csrf

    <button class="px-4 py-2 bg-yellow-400 rounded">
        👏 Clap ({{ $post->claps->count() }})
    </button>
</form>