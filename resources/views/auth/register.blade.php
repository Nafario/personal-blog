<x-app>
    <div class="container w-full h-screen flex flex-col justify-center items-center">
        <div class="mx-auto border bg-gray-800 text-white px-12 py-12 rounded -mt-12" style="width: 600px;">
            <h1 class=" text-3xl mb-6 font-semibold">{{ __('Register') }}</h1>
            <div class="col-md-8">
                <div class="card">
                    <div class="flex flex-col justify-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="outline-none border-2 w-full h-8 pl-2 px-4 mb-4 mt-2 rounded text-gray-900 @error('name') border-red-600 @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="outline-none border-2 w-full h-8 pl-2 px-4 mb-4 mt-2 rounded text-gray-900  @error('username') border-red-600 @enderror"
                                        name="username" value="{{ old('username') }}" required autocomplete="name"
                                        autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="outline-none border-2 w-full h-8 pl-2 px-4 mb-4 mt-2 rounded text-gray-900  @error('email') border-red-600 @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="outline-none border-2 w-full h-8 pl-2 px-4 mb-4 mt-2 rounded text-gray-900  @error('password') border-red-600 @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                        class="outline-none border-2 w-full h-8 pl-2 px-4 mb-4 mt-2 rounded text-gray-900 "
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class=" mb-0">
                                <div class="">
                                    <button type="submit" class="py-1 px-4 border">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>