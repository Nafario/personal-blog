<header class="justify-between items-center h-20 px-12" id="normal-header">
    {{-- Logo --}}
    <div class="logo text-4xl font-bold"><a href="/"> Gamer Tag</a></div>
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
        </ul>
    </nav>
    {{-- social --}}
    <div class="social-links">
        @include('inc.social-link')
    </div>
</header>

{{-- For mobile menu --}}
<header class="bg-white text-black h-full fixed" style="width: 300px;" id="mobile-nav">
    {{-- Logo --}}

    <div class="flex flex-col ml-6 mt-6">
        <span class=" flex justify-between items-center pr-4 ">
            <div class="logo text-4xl font-bold">Gamer Tag</div>
            <i class="fas fa-times text-3xl cursor-pointer" id="hide"></i>
        </span>
        {{-- navigation link --}}
        <nav class="nav-links text-base tracking-widest mt-6">
            <ul class="flex flex-col font-semibold">
                <li class=" mb-4"><a href="{{ route('home') }}">Home</a></li>
                <li class=" mb-4"><a href="{{ route('blog') }}">Blog</a></li>
                <li class=" mb-4 relative category-parent">
                    <a href="" class=" h-20">Category</a>
                    <ul class="absolute category-child text-gray-300 mt-2">
                        @foreach ($categories as $category)
                        <li class="py-2 pl-2 pr-8 border-b bg-gray-800 text-sm hover:bg-gray-600"><a
                                href="{{ route('single-category', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class=" mb-4"><a href="">About Us</a></li>
                <li class=" mb-4"><a href="">Contact</a></li>
            </ul>
        </nav>
        {{-- social --}}
        <div class=" absolute bottom-0 mb-10">
            @include('inc.social-link')
        </div>
    </div>
</header>
<div class="text-4xl inline ml-4 cursor-pointer" id="show">
    <i class="fas fa-bars"></i>
</div>
<style>
    #mobile-nav {
        display: none;
    }

    #normal-header {
        display: none;
    }

    @media screen and (min-width: 769px) {
        #normal-header {
            display: flex;
        }

        #mobile-nav {
            display: none;
        }

        #show {
            display: none;
        }
    }
</style>

<script>
    document.addEventListener('turbolinks:load', () => {
        const hide = document.querySelector('#hide')
        const show = document.querySelector('#show')
        const mobileNav = document.querySelector('#mobile-nav')
        hide.addEventListener('click', () => {
            mobileNav.style.display = 'none'
        })
        show.addEventListener('click', () => {
            mobileNav.style.display = 'block'
            mobileNav.style.zIndex = '9999999999'
        })
    })
</script>