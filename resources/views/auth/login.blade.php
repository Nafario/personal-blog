<x-app>
    <main class=" w-full h-screen flex flex-col justify-center items-center">
        <div class="mx-auto border bg-gray-800 text-white px-12 py-12 rounded -mt-12" style="width: 600px;">
            <h1 class=" text-3xl mb-6 font-semibold">{{ __('Login') }}</h1>
            <div class="flex flex-col justify-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="">
                        <label for="email" class="font-medium">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email"
                            class="outline-none border-2 w-full h-8 pl-2 px-4 mb-4 mt-2 rounded text-gray-900 @error('email') border-red-600 @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class=" text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="py-4 font-medium">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="outline-none border-2 w-full h-8 mb-4 mt-2 rounded text-gray-900 @error('password') border-red-600 @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="">
                        <input class="" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="">
                        <button type="submit" class="py-2 px-4 bg-green-500 rounded-md mt-4 mr-3">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class=" text-gray-400 hover:text-white" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                </form>
            </div>
        </div>
    </main>
</x-app>