<header class="flex justify-between items-center h-20 px-12">
    {{-- Logo --}}

    <div class="logo text-4xl font-bold">Gamer Tag</div>
    {{-- navigation link --}}
    <nav class="nav-links text-base tracking-widest">
        <ul class="flex">
            <li class="mr-2 py-1 px-5"><a href="{{ route('home') }}">Home</a></li>
            <li class="mx-2 py-1 px-5"><a href="{{ route('blog') }}">Blog</a></li>
            <li class="mx-2 py-1 px-5 relative category-parent">
                <a href="" class=" h-20">Category</a>
                <ul class="absolute category-child text-black mt-2">
                    @foreach ($categories as $category)
                    <li class="py-2 pl-2 pr-8 border-b bg-white text-sm hover:opacity-75"><a
                            href="{{ route('single-category', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="mx-2 py-1 px-5"><a href="">About Us</a></li>
            <li class="ml-2 py-1 px-5"><a href="">Contact</a></li>
        </ul>
    </nav>
    {{-- social --}}
    <div class="social-links">
        @include('inc.social-link')
    </div>
</header>
<style>

</style>