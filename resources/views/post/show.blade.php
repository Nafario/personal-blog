<x-home>
    <div class="top-0 w-full shadow-lg">
        @include('inc.header')
    </div>
    <div class=" text-center text-white relative">
        <div style="height: 450px;" class="absolute w-full bg-black opacity-50 z-20" id="overlay-bg">
        </div>
        <section
            style="background-image: url({{ asset('storage/' . $singlePost->thumbnail ) }});background-position: center center;background-size: cover; height:450px;"
            class="absolute w-full z-0">
        </section>
        <div class="flex justify-center items-center flex-col" style="height: 450px">
            <span class="text-xl z-50">{{ $singlePost->category->name }}</span>
            <h1 class="text-5xl z-50">
                {{ $singlePost->title }}
            </h1>
            <p class="text-sm z-50 opacity-75">
                {{ $singlePost->created_at->format('F j, Y') }}
            </p>
        </div>
    </div>
    <x-app>
        <main class="container mx-auto grid grid-cols-1 md:grid-cols-5 col-gap-10 mt-10">
            <div class="md:col-span-3">
                <div class="information flex justify-between items-center border-t border-b py-4 px-4 md:px-0">
                    <section class="">
                        <small class="text-xs text-gray-600"><i>Written By</i> </small>
                        <div class=" flex justify-start items-center">
                            <section class=" rounded-full"
                                style="background-image: url({{ asset('storage/' . $user->avatar ) }}); width:50px; height:50px; background-position: center center;">

                            </section>
                            <p class="ml-2">
                                {{ $user->name }}
                            </p>
                        </div>
                    </section>
                    <section class="text-xl md:sm">
                        @include('inc.social-link')
                    </section>
                </div>
                <p class=" px-4 md:px-0">
                    {{ $singlePost->body }}
                </p>
                <div class="flex mt-6 items-center px-4 md:px-0">
                    <p class=" font-bold mr-2">Tags :</p>
                    @foreach ($singlePost->tags as $tag)
                    <a href="{{ route('single-tag', $tag->id) }}"
                        class="mr-2 px-1 py-1 border text-sm text-gray-500">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="md:col-span-2">
                @include('inc.side-bar')
            </div>
        </main>
    </x-app>
    @include('inc.footer')
</x-home>