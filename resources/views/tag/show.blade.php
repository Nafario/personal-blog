<x-home>
    <div class="top-0 w-full">
        @include('inc.header')
    </div>
    <div class=" bg-gray-200 text-center py-8">
        <small><i>Browsing Tag</i> </small>
        <h1 class="text-2xl font-semibold"> {{ $tags->name }}</h1>
    </div>
</x-home>
<x-app>
    <div class="relative">
        <main class="container mx-auto grid grid-cols-1 md:grid-cols-5 col-gap-10 mt-10">
            <article class="post md:col-span-3">
                @include('inc.new-tag')

            </article>
            <aside class="side-bar md:col-span-2">
                @include('inc.side-bar')
            </aside>
        </main>
    </div>
</x-app>
<x-home>
    @include('inc.footer')
</x-home>