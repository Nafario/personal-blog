<section class="new-post flex justify-center items-center flex-col px-4 md:px-0">
    @foreach ($categoryPosts as $catPost)
    <h1 class="tracking-wider text-4xl my-4">
        {{ $catPost->title }}
    </h1>
    <p class="text-xl opacity-75 side-line relative">
        {{ $catPost->created_at->format('F j, Y') }}
    </p>
    <section class="new-post-image my-5"
        style="background-image: url({{  $catPost->thumbnail  }});background-position: center center;background-size: cover;">
    </section>
    <p class="tracking-wider leading-8 text-base">{{ Str::limit($catPost->body, 220) }}</p>
    <a href="{{ route('single-post', $catPost->id) }}"
        class="pb-2 font-semibold border-b my-4 hover:text-teal-600">Continue Reading</a>
    <hr class="my-8 h-px w-full">
    @endforeach
    <div class="my-10">
        {{ $categoryPosts->links() }}
    </div>
</section>