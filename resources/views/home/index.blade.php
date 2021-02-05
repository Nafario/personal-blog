<x-home>
    <div>
        <div class="top-section h-screen relative">
            <div class="absolute top-0 z-10 w-full text-white">
                @include('inc.header')
            </div>
            @include('inc.carousel')
            <main class="container mx-auto grid grid-cols-1 md:grid-cols-3 col-gap-10 mt-10">
                <div class="post md:col-span-2">
                    @include('inc.new-post')
                    <div class="social-link text-xl flex justify-center items-center relative">
                        @include('inc.social-link')
                    </div>
                    @include('inc.post-card')
                    <div class="my-10">
                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="side-bar md:col-span-1">

                    @include('inc.side-bar')
                </div>
            </main>
            @include('inc.footer')
        </div>
    </div>

</x-home>