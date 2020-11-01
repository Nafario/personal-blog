<footer
    class="flex flex-col justify-between items-center px-20 py-4 sm:py-8 text-xs md:text-base md:flex-row bg-gray-900 text-white">
    <div class="logo">
        <p>@Nafario All Rights Reserved.</p>
    </div>
    <nav class="nav-links tracking-widest md:my-2">
        <ul class="flex">
            <li class="mr-2 py-1 px-5"><a href="{{ route('home') }}">Home</a></li>
            <li class="mx-2 py-1 px-5"><a href="">Blog</a></li>
            <li class="mx-2 py-1 px-5"><a href="">About Us</a></li>
            <li class="ml-2 py-1 px-5"><a href="">Contact</a></li>
        </ul>
    </nav>
    <div class="">
        @include('inc.social-link')
    </div>
</footer>