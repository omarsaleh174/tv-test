        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label >email</label>
                <input type="email"name="email">
                <input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />
            </div>

            <div class="mt-4">
                <label value="Password" />
                <input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="ml-4">
                    {{ __('Login') }}
                </button>
            </div>

             <a href="{{ route('facebook.login') }}" class="btn btn-facebook btn-user btn-block">

               <i class="fab fa-facebook-f fa-fw"></i>
                Login with Facebook

            </a>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a>
            </div>
        </form>

