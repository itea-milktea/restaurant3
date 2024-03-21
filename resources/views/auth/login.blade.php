<x-guest-layout>
    <!-- Session Status -->
    @section('title', 'Login')
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex min-h-screen">
        <div
            class="bg-gradient-to-t from-[#ff1361bf] to-[#44107A] w-1/2  min-h-screen hidden lg:flex flex-col items-center justify-center text-white dark:text-black p-4">
            <div class="w-full mx-auto mb-5"><img src="/assets/images/anaalogo.png" alt="coming_soon"
                    class="lg:max-w-[370px] xl:max-w-[400px] mx-auto" /></div>
            
        </div>
        <div class="w-full lg:w-1/2 relative flex justify-center items-center">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <div class="max-w-[480px] p-5 md:p-10">
                <h2 class="font-bold text-3xl mb-3">Sign In</h2>
                <p class="mb-7">Enter your email and password to login</p>
                <form class="space-y-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    

                    <button type="submit" class="btn btn-primary w-full">SIGN IN</button>
                </form>
                <div
                    class="relative my-7 h-5 text-center before:w-full before:h-[1px] before:absolute before:inset-0 before:m-auto before:bg-[#ebedf2]  dark:before:bg-[#253b5c]">
                    
               




             
                @endauth

            </div>
        </div>
    </div>


</x-guest-layout>