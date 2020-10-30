<header class="flex justify-between items-center h-12 px-12 mb-2">
    {{-- Logo --}}

    <div class="logo text-4xl font-bold">Gamer Tag</div>
    {{-- navigation link --}}
    <nav class="nav-links text-base tracking-widest">
        <ul class="flex">
            <li class="mr-2 py-1 px-5"><a href="{{ route('home') }}">Home</a></li>
            <li class="mx-2 py-1 px-5"><a href="{{ route('blog') }}">Blog</a></li>
        </ul>
    </nav>
    {{-- social --}}
    <div class="">
        @include('inc.social-link')
    </div>
</header>
<style>
    .category-child {
        visibility: hidden;
    }

    .category-parent:hover .category-child {
        visibility: visible;
    }
</style>