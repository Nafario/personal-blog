<div class="grid grid-cols-1 px-4 md:grid-cols-2 col-gap-12 row-gap-12 mt-6">
    @foreach ($posts as $post)
    <article class="border shadow-lg">
        <section class="article-image"
            style="background-image: url({{ asset('storage/' . $post->thumbnail ) }});background-position: center center;background-size: cover;">
        </section>
        <div class="px-6 py-4 flex flex-col justify-center" style="height: 240px">
            <a href="{{ route('single-post', $post->id) }}"
                class="text-2xl tracking-wider font-bold">{{ $post->title }}</a> <br>
            <a href="{{ route('single-post', $post->id) }}" class="text-sm">
                {{ Str::limit($post->body, 120) }}</a>
            <p class="text-sm mt-4 opacity-50">
                {{ $post->created_at->format('F j, Y') }}
            </p>
        </div>
    </article>
    @endforeach
</div>