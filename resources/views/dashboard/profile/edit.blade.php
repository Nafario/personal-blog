<x-dashboard>
   <div class=" mx-auto mt-8 text-sm text-gray-600" style="width: 600px;">
      <form method="POST" action="{{ route('dashboard', $user->id) }}" enctype="multipart/form-data">
         @csrf
         @method('PATCH')

         <div class="mb-6">
            <label class="block mb-1 uppercase font-bold text-xs text-teal-500" for="name">
               Name
            </label>

            <input class="border rounded border-gray-400 p-1 pl-2 w-full" type="text" name="name" id="name"
               value="{{ auth()->user()->name }}">

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-6">
            <label class="block mb-1 uppercase font-bold text-xs text-teal-500" for="username">
               Username
            </label>

            <input class="border rounded border-gray-400 p-1 pl-2 w-full" type="text" name="username" id="username"
               value="{{ auth()->user()->username }}">

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-6">
            <label class="block mb-1 uppercase font-bold text-xs text-teal-500" for="avatar">
               Avatar
            </label>

            <div>
               <input class="border rounded border-gray-400 p-1 w-full" type="file" name="avatar" id="avatar"
                  accept="image/*">

            </div>

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
         </div>


         <div class="mb-6">
            <label class="block mb-1 uppercase font-bold text-xs text-teal-500" for="email">
               Email
            </label>

            <input class="border rounded border-gray-400 p-1 pl-2 w-full" type="email" name="email" id="email"
               value="{{ auth()->user()->email }}">

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-6">
            <label class="block mb-1 uppercase font-bold text-xs text-teal-500" for="password">
               Password
            </label>

            <input class="border rounded border-gray-400 p-1 w-full" type="password" name="password" id="password">

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-6">
            <label class="block mb-1 uppercase font-bold text-xs text-teal-500" for="password_confirmation">
               Password Confirmation
            </label>

            <input class="border rounded border-gray-400 p-1 w-full" type="password" name="password_confirmation"
               id="password_confirmation">

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-6">
            <button type="submit" class="bg-green-400 text-white rounded py-2 px-4 hover:bg-green-500 mr-4">
               Submit
            </button>

            <a href="{{ route('dashboard', auth()->user()->username) }}" class="hover:underline">Cancel</a>
         </div>
      </form>
   </div>
</x-dashboard>