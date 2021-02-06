<div class="carousel-container">
    <div class="carousel h-screen">
        <div class="slider text-center text-white">
            @foreach ($exclusivePost as $exPost)
            <section style="background-image: url({{ $exPost->thumbnail  }});background-position: center
        center;background-size: cover;">
                <a href="{{ route('single-post', $exPost->id) }}" class="flex flex-col">
                    <h1 class="text-xl md:text-3xl px-32">
                        {{  $exPost->title }}
                    </h1>
                    <small class="text-base px-32 opacity-75">
                        {{ $exPost->created_at->format('F j, Y') }}
                    </small>
                </a>
            </section>
            @endforeach
        </div>
        <div class="controls">
            <span class="prev">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="next">
                <i class="fas fa-arrow-right"></i>
            </span>
        </div>
    </div>
</div>