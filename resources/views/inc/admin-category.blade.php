<div class="px-6 text-right flex justify-between mb-4">
    <h1 class=" font-semibold text-3xl">Categories</h1>
    <a href="{{ route('create-category') }}"
        class="text-base border text-indigo-600 border-indigo-600 px-6 py-2 hover:opacity-75">Create
        New Category</a>
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
<div class="flex flex-col mb-6">
    {{-- <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> --}}
    <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                            Name
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                            Total Post
                        </th>
                        <th
                            class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                            Created At
                        </th>
                    </tr>
                </thead>
                @foreach ($categories as $cat)
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-xs leading-5 font-medium text-gray-900">
                                        {{ $cat->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-no-wrap">
                            <div class="text-xs break-words leading-5 text-gray-900">
                                {{ $cat->posts->count() }}
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-no-wrap">
                            {{-- created at --}}
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $cat->created_at->format('F j, Y') }}
                            </span>
                        </td>
                        <td class="px-3 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="" class="text-indigo-600 hover:text-indigo-900">View</a>
                        </td>
                        <td class="px-2 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <a href="{{ route('edit-category', $cat->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                        <td class="px-2 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <form action="/dashboard/category/{{$cat->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    class=" py-1 px-2 text-red-500 border hover:text-white hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    {{-- </div> --}}
</div>