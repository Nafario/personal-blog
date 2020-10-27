<x-dashboard>
    <section style="width: 700px" class="mx-auto mt-8">
        @if (session('msg'))
        <p class=" bg-green-300 text-sm text-gray-100 py-2 px-4 mb-4">{{ session('msg') }}</p>
        @endif
        <div class="mb-16">
            <p class=" text-red-600 text-xs mb-4">Check Category Before Add New One *</p>
            <label for="category" class="text-base font-medium leading-5 text-gray-700">Category</label>
            <select id="category" name="category"
                class="mt-1 form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-base sm:leading-5">
                @foreach ($category as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <form action="/dashboard/category/create" method="post">
            @csrf
            <div class="block">
                <label for="name" class="text-base font-medium leading-5 text-gray-700">Add New
                    Category</label>
                <input id="name" name="name"
                    class="mt-1 form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @error('name')
                    <p class=" text-red-600 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="py-2 px-4 text-base leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                    Create
                </button>
            </div>
        </form>
    </section>
</x-dashboard>