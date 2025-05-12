<div x-show="mobileMenuOpen" class="fixed inset-0 z-50">
    <!-- Overlay -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-50"
         @click="mobileMenuOpen = false"
         aria-hidden="true">
    </div>

    <!-- Mobile menu panel -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         class="fixed inset-y-0 right-0 w-64 bg-white dark:bg-gray-800 shadow-lg p-6 overflow-y-auto">

        <!-- Close button -->
        <button @click="mobileMenuOpen = false" class="absolute top-5 right-5 text-gray-500 hover:text-gray-800 dark:hover:text-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Mobile navigation links -->
        <nav class="mt-8 space-y-6">
            <a href="#" class="block text-gray-800 dark:text-gray-100 hover:text-orange-500 font-medium">Home</a>
            <a href="#tentang-kami" class="block text-gray-800 dark:text-gray-100 hover:text-orange-500 font-medium">Tentang Kami</a>
            <a href="#" class="block text-gray-800 dark:text-gray-100 hover:text-orange-500 font-medium">FAQ</a>
            <a href="#" class="block text-gray-800 dark:text-gray-100 hover:text-orange-500 font-medium">Kontak</a>

            <hr class="border-gray-200 dark:border-gray-700">

            <!-- Authentication links -->
            @auth
                <a href="{{ url('/dashboard') }}" class="block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md text-center transition">Dashboard</a>
            @else
                <div class="space-y-3">
                    <a href="{{ route('login') }}" class="block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md text-center transition">Masuk</a>
                    <a href="{{ route('register') }}" class="block border border-green-500 text-green-500 hover:bg-green-500 hover:text-white px-4 py-2 rounded-md text-center transition">Daftar</a>
                </div>
            @endauth
        </nav>
    </div>
</div>
