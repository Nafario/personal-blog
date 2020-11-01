<x-app>
    <div class="w-full h-screen flex flex-col justify-center items-center">
        <div class="mx-auto border bg-gray-800 text-white px-12 py-12 rounded -mt-16" style="width: 600px;">
            <div class="card">
                <div class=" text-2xl font-semibold mb-4">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class=" text-red-600" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="">
                                <label for="email"
                                >{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                    class="outline-none border-2 w-full h-8 pl-2 px-4 mb-4 mt-2 rounded text-gray-900 @error('email') border-red-600 @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class=" text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        <div class="">
                            <button type="submit" class=" text-lg text-gray-300 hover:text-white">
                                <i class="fas fa-paper-plane mr-2"></i>{{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>