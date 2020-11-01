<div class="px-6 text-right flex justify-between mb-4 ">
    <h1 class=" font-semibold text-3xl">Posts</h1>
    <a href="{{ route('create-post') }}"
        class="text-indigo-600 text-base border border-indigo-600 px-6 py-2 hover:opacity-75">Create
        New Post</a>
</div>
@if (session('msg'))
<div class="px-12">
    <p class=" bg-green-300 text-sm text-gray-100 py-2 px-4 mb-4" id="session-msg">{{ session('msg') }}</p>
</div>
@endif
@if (session('delete'))
<div class="px-12">
    <p class=" bg-red-600 text-sm text-gray-100 py-2 px-4 mb-4" id="session-delete">{{ session('delete') }}</p>
</div>
@endif
<div class="flex flex-col px-4 mb-6">
    {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
    <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                            Title
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                            Excerpt
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                            Posted At
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                            Category
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-center text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                            Tags
                        </th>
                        <th class="px-3 py-3 bg-gray-50"></th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ $post->thumbnail }}" alt="Thumbnail">
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs leading-5 font-medium text-gray-900">
                                        {{ Str::limit($post->title, 30) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-no-wrap">
                            <div class="text-xs break-words leading-5 text-gray-900">
                                {{ Str::limit($post->body, 50)  }}
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-no-wrap">
                            {{-- created at --}}
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $post->created_at->format('F j, Y') }}
                            </span>
                        </td>
                        {{-- category --}}
                        <td class="px-3 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $post->category->name }}
                        </td>
                        {{-- Tags --}}
                        <td class="text-sm leading-5 text-gray-600 ">
                            <p class="bg-orange-100 text-center">
                                @foreach ($post->tags as $tag)
                                {{ $tag->name }}<br>
                                @endforeach
                            </p>
                        </td>
                        <td class="px-3 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="{{ route('single-post', $post->id) }}" target="_blank"
                                class="text-indigo-600 hover:text-indigo-900">View</a>
                        </td>
                        <td class="px-3 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="{{ route('edit-post', $post->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                        <td class="px-3 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <form action="/dashboard/posts/{{$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    class=" py-1 px-2 text-red-500 border hover:text-white hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- More rows... -->
                </tbody>
                @endforeach
            </table>
            <section class="my-6 text-sm">
                {{ $posts->links() }}
            </section>
        </div>
    </div>
    {{-- </div> --}}
</div>