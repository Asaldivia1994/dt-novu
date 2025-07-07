<x-guest-layout>
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="flex w-full flex-wrap">
            <div class="flex w-full flex-col md:w-1/2 lg:w-1/3">
                <div class="flex justify-center pt-12 md:-mb-24 md:justify-start md:pl-12">
                    <a href="#" class="border-b-4 border-b-blue-700 pb-2 text-2xl font-bold text-gray-900 dark:text-white">
                        NOVU.
                    </a>
                </div>
                <div class="my-auto flex flex-col justify-center px-6 pt-8 sm:px-24 md:justify-start md:px-8 md:pt-0 lg:px-12">
                    <p class="text-center text-3xl font-bold text-gray-900 dark:text-white">Inicia sesión en tu cuenta</p>
                    <p class="mt-2 text-center text-gray-700 dark:text-gray-300">La mejor experiencia para tu negocio</p>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="mt-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Recordar</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif

                            <x-primary-button class="ms-3">
                                Ingresar
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="pt-12 pb-12 text-center">
                        <p class="whitespace-nowrap text-gray-600 dark:text-gray-400">
                            ¿No tienes cuenta?
                            <a href="#" class="font-semibold underline text-blue-700 dark:text-blue-400">Regístrate aquí.</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="pointer-events-none hidden select-none bg-black shadow-2xl md:block md:w-1/2 lg:w-2/3">
                <img class="h-screen w-full object-cover opacity-90" src="https://novu-admin-test.netlify.app/assets/761404-restaurant-food-architecture-interior-design-room-Bv-HC_Aw.jpg" />
            </div>
        </div>
    </div>
</x-guest-layout>