<x-home>
    @include('inc.admin-header')
    <main class="">
        <div class="grid grid-cols-6 h-screen">
            <div class="profile col-span-1 bg-gray-900">
                <section class="mb-8 flex flex-col justify-center items-center text-white">
                    <section class="mb-4 rounded-full mt-2"
                        style="background-image: url({{ auth()->user()->avatar }}); background-position: center center; width:150px; height:150px;">
                    </section>
                    <p class=" font-semibold">{{ auth()->user()->name }}</p>
                </section>
                <nav class="text-white text-xl">
                    <ul>
                        <li class="pl-4 mb-6"><a href="{{ route('dashboard', auth()->user()->username) }}"><i
                                    class="fas fa-user-circle mr-2"></i>Profile</a>
                        </li>
                        <li class="pl-4 "><a href="{{ route('admin-posts') }}"><i class="fas fa-paste mr-2"></i>Post</a>
                        </li>
                        <li class="pl-4 my-6"><a href="{{ route('admin-category') }}"><i
                                    class="fas fa-th-list mr-2"></i>Category</a></li>
                        <li class="pl-4 "><a href="{{ route('admin-tag') }}"><i class="fas fa-tags mr-2"></i>Tags</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="content col-span-5">
                {{ $slot }}
            </div>
        </div>
    </main>
    <script>
        const messageDel = document.querySelector('#session-delete')
        const messageMsg = document.querySelector('#session-msg')
        setTimeout(() => {
            messageDel.style.opacity = '0'
            messageDel.style.transition = 'ease-in .5s'
        }, 2000);
        setTimeout(() => {
            messageMsg.style.opacity = '0'
            messageMsg.style.transition = 'ease-in .5s'
        }, 2000);
    </script>
</x-home>