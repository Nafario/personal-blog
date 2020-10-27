<x-home>
    @include('inc.admin-header')
    <main class="px-12">
        <h1>Dashboard</h1>
        <div class="grid grid-cols-5 h-screen">
            <div class="profile col-span-1 bg-gray-900">
                <section class="mb-10 flex flex-col justify-center items-center text-white">
                    <h1>Profile photo</h1>
                    <p>{{ auth()->user()->name }}</p>
                </section>
                <nav class="text-white text-xl">
                    <ul>
                        <li class="pl-4 "><a href="{{ route('admin-posts') }}"><i class="fas fa-paste mr-2"></i>Post</a>
                        </li>
                        <li class="pl-4 my-6"><a href="{{ route('admin-category') }}"><i
                                    class="fas fa-th-list mr-2"></i>Category</a></li>
                        <li class="pl-4 "><a href="{{ route('admin-tag') }}"><i class="fas fa-tags mr-2"></i>Tags</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="content col-span-4">
                {{ $slot }}
            </div>
        </div>
    </main>
</x-home>