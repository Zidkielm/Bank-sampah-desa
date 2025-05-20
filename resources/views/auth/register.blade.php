<x-authentication-layout>
    <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">{{ __('Create your Account') }}</h1>
    <!-- Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-label for="name">{{ __('Full Name') }} <span class="text-red-500">*</span></x-label>
                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="username">{{ __('Username') }} <span class="text-red-500">*</span></x-label>
                <x-input id="username" type="text" name="username" :value="old('username')" required />
            </div>

            <div>
                <x-label for="email">{{ __('Email Address') }}</x-label>
                <x-input id="email" type="email" name="email" :value="old('email')" />
            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            <div class="mr-1">

            </div>
            <x-button>
                {{ __('Sign Up') }}
            </x-button>
        </div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-6">
            <label class="flex items-start">
                <input type="checkbox" class="form-checkbox mt-1" name="terms" id="terms" />
                <span class="text-sm ml-2">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm underline hover:no-underline">'.__('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm underline hover:no-underline">'.__('Privacy Policy').'</a>',
                    ]) !!}
                </span>
            </label>
        </div>
        @endif
    </form>
    <x-validation-errors class="mt-4" />
    <!-- Footer -->

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
    <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        <div class="text-sm">
            {{ __('Have an account?') }} <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="{{ route('login') }}">{{ __('Sign In') }}</a>
        </div>
    </div>
</x-authentication-layout>