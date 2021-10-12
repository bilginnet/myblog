<x-layouts.master>

    <x-partials.post_header :post="$post" />

    <article>
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <blockquote>
                        <p class="mb-0">{{ $post->excerpt }}</p>
                    </blockquote>

                    {{ $post->body }}
                    <hr>

                    @if (auth()->check())
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ route('post.rate', ['post' => $post, 'rate' => 1]) }}" class="btn btn-info">1</a></li>
                            <li class="list-inline-item"><a href="{{ route('post.rate', ['post' => $post, 'rate' => 2]) }}" class="btn btn-info">2</a></li>
                            <li class="list-inline-item"><a href="{{ route('post.rate', ['post' => $post, 'rate' => 3]) }}" class="btn btn-info">3</a></li>
                            <li class="list-inline-item"><a href="{{ route('post.rate', ['post' => $post, 'rate' => 4]) }}" class="btn btn-info">4</a></li>
                            <li class="list-inline-item"><a href="{{ route('post.rate', ['post' => $post, 'rate' => 5]) }}" class="btn btn-info">5</a></li>
                        </ul>
                    @endif

                    <div class="clearfix">
                        Total Avg: {{ $post->rate_avg }}
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6 text-left">
                            @if ($prev)
                                <a class="btn btn-primary" href="{{ route('post.show', $prev) }}">&larr; Prev Post</a>
                            @endif
                        </div>

                        <div class="col-6 text-right">
                            @if ($next)
                                <a class="btn btn-primary" href="{{ route('post.show', $next) }}">Next Post &rarr;</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </article>
</x-layouts.master>
