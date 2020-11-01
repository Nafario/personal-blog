<div class="profile-card px-8 text-center">
    <h1 class="side-bar-line relative">About Me</h1>
    <section class="profile-image my-5"
        style="background-image: url({{ asset('imgs/profile.jpg') }});background-position: center center;background-size: cover;">
    </section>
    <p class="mb-4">{{ $user->name ?? '' }}</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero culpa sequi , </p>
</div>
<div class="text-center mt-8">
    <p class="side-bar-line relative">Subscribe & Follow</p>
    <div class="flex justify-between px-24 text-2xl mt-4">
        @include('inc.social-link')
    </div>
</div>
<div class="featured-post px-8 text-center mt-6">
    <h1 class="side-bar-line relative">Featured Article</h1>
    @foreach ($featuredPost as $fPost)
    <section class="featured-post-image my-5"
        style="background-image: url({{ $fPost->thumbnail }});background-position: center center;background-size: cover;">
    </section>
    <a href="{{ route('single-post', $fPost->id) }}" class=" my-4">
        {{ $fPost->title }}
    </a>
    <p class="text-sm opacity-50">
        {{ $fPost->created_at->format('F j, Y') }}
    </p>
    @endforeach
</div>