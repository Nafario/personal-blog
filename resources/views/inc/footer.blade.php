<footer class="flex justify-between items-center px-20 h-24 pt-16 pb-10 bg-gray-900 text-white">
    <div class="logo text-sm">
        <p>@Nafario All Rights Reserved.</p>
    </div>
    <nav class="nav-links text-base tracking-widest">
        <ul class="flex">
            <li class="mr-2 py-1 px-5"><a href="{{ route('home') }}">Home</a></li>
            <li class="mx-2 py-1 px-5"><a href="">Blog</a></li>
            <li class="mx-2 py-1 px-5"><a href="">About Us</a></li>
            <li class="ml-2 py-1 px-5"><a href="">Contact</a></li>
        </ul>
    </nav>
    <div class="text-xl">
        @include('inc.social-link')
    </div>
</footer>