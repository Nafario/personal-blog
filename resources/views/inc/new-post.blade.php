<section class="new-post flex justify-center items-center flex-col px-4 md:px-0">
    @foreach ($newPost as $item)
    <p>{{ $item->category->name }}</p>
    <h1 class="tracking-wider text-4xl my-4">
        {{ $item->title }}
    </h1>
    <p class="text-lg opacity-75 side-line relative">
        {{ $item->created_at->format('F j, Y') }}
    </p>
    <section class="new-post-image my-5"
        style="background-image: url({{  $item->thumbnail  }});background-position: center center;background-size: cover;">
    </section>
    <p class="tracking-wider leading-8 text-base">{{ Str::limit($item->body, 220) }}</p>
    <a href="{{ route('single-post', $item->id) }}"
        class="pb-2 font-semibold text-lg border-b my-4 hover:text-teal-600">Continue Reading</a>
    <hr class="my-8 h-px w-full">
    @endforeach
</section>