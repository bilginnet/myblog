<div>

    @forelse($posts as $post)

        <div class="post-preview">
            <a href="{{ route('post.show', $post) }}">
                <h2 class="post-title">
                    {{ $post->title }}
                </h2>
                <h3 class="post-subtitle">
                    {{ $post->excerpt }}
                </h3>
            </a>
            <p class="post-meta">
                Posted by <strong>{{ $post->user->name }}</strong> on {{ \Carbon\Carbon::createFromFormat('Y-m-d', $post->publish_date)->toDateString() }}
            </p>
        </div>
        <hr>

    @empty
        No data found!!!
    @endforelse

    {{ $posts->onEachSide(5)->links() }}

</div>
