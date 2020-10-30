<x-dashboard>
    <div class="profile">
        @if (session('msg'))
        <p>{{ session('msg')  }}</p>
        @endif
        <main style="width: 600px;" class="mx-auto mt-12 text-lg text-gray-600">
            <div class="avatar">
                <section class="mb-4"
                    style="background-image: url({{ $user->avatar }}); background-position: center center; width:200px; height:200px;">
                </section>
            </div>
            <p class=" py-2 border-b mb-3">
                Username: {{ $user->username }}
            </p>
            <p class=" py-2 border-b mb-3">
                Name: {{ $user->name }}
            </p>
            <p class=" py-2 border-b mb-3">
                Email Address: {{ $user->email }}
            </p>
            <p class=" py-2 mb-3">
                Total Post Created: {{ $user->posts->count() }}
            </p>
            <div class="flex justify-end">

                <a class="" href="{{ route('profile-edit', $user->username) }}">Edit</a>
            </div>
        </main>
    </div>
</x-dashboard>