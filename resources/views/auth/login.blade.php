<x-authentication-layout>
    <h1 class="mb-6 text-3xl font-bold text-gray-800 dark:text-gray-100">{{ __('Selamat Datang!') }}</h1>
    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-label for="username" value="{{ __('Username') }}" />
                <x-input id="username" type="text" name="username" :value="old('username')" required autofocus />
            </div>
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between">
            @if (Route::has('password.request'))
                <div class="mr-1">
                    <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
            @endif
            <x-button class="ml-3">
                {{ __('Sign in') }}
            </x-button>
        </div>
    </form>
    <x-validation-errors class="mt-4" />
    <!-- Footer -->

    <!-- Tombol Kembali ke Landing Page -->
    <div class="mt-2">
        <a href="{{ url('/landing') }}"
            class="inline-flex items-center text-sm font-medium text-gray-600 transition-colors hover:text-violet-600 dark:text-gray-300 dark:hover:text-violet-400">
            <svg xmlns="http://www.w3.org/2000/svg" class=" h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            {{ __('Kembali ke Beranda') }}
        </a>
    </div>
    <div class="mt-6 border-t border-gray-100 pt-5 dark:border-gray-700/60">
        <div class="text-sm">
            {{ __('Belum punya akun?') }} <a
                class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                href="{{ route('register') }}">{{ __('Daftar Sekarang') }}</a>
        </div>
    </div>
</x-authentication-layout>
