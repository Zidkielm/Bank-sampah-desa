<div class="min-w-fit">
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-gray-900/30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex lg:flex! flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:w-64! shrink-0 bg-white dark:bg-gray-800 p-4 transition-all duration-200 ease-in-out {{ $variant === 'v2' ? 'border-r border-gray-200 dark:border-gray-700/60' : 'rounded-r-2xl shadow-xs' }}"
        :class="sidebarOpen ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="flex items-center" href="/">
                <img class="h-12 w-auto mr-3" src="{{ asset('images/logo-bank-sampah.svg') }}" alt="Logo">
                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                    <span class="text-gray-800 dark:text-gray-100 font-bold text-md block">Bank Sampah</span>
                    <span class="text-gray-800 dark:text-gray-100 font-bold text-md block">Sumber Pawana</span>
                </div>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3>
                <ul class="mt-3">
                    @php
                    $user = Auth::user();
                    @endphp

                    @if($user->role === 'admin')
                    {{-- Dashboard --}}
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('dashboard')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('dashboard')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('dashboard') }}">
                            <div class="flex items-center">
                                <i data-feather="home" class="shrink-0 @if(request()->routeIs('dashboard')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <!-- Data Nasabah -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('data-nasabah')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('data-nasabah')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('data-nasabah') }}">
                            <div class="flex items-center">
                                <i data-feather="users" class="shrink-0 @if(request()->routeIs('data-nasabah')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Data Nasabah</span>
                            </div>
                        </a>
                    </li>
                    <!-- Data Petugas -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('data-petugas')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('data-petugas')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('data-petugas') }}">
                            <div class="flex items-center">
                                <i data-feather="user-check" class="shrink-0 @if(request()->routeIs('data-petugas')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Data Petugas</span>
                            </div>
                        </a>
                    </li>
                    <!-- Data Sampah -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('data-sampah')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('data-sampah')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('data-sampah') }}">
                            <div class="flex items-center">
                                <i data-feather="trash-2" class="shrink-0 @if(request()->routeIs('data-sampah')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Data Sampah</span>
                            </div>
                        </a>
                    </li>
                    <!-- Setoran -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('setoran')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('setoran')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('setoran') }}">
                            <div class="flex items-center">
                                <i data-feather="dollar-sign" class="shrink-0 @if(request()->routeIs('setoran')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pengambilan</span>
                            </div>
                        </a>
                    </li>
                    <!-- Tarik Saldo -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('tarik-saldo')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('tarik-saldo')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('tarik-saldo') }}">
                            <div class="flex items-center">
                                <i data-feather="credit-card" class="shrink-0 @if(request()->routeIs('tarik-saldo')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pembelian</span>
                            </div>
                        </a>
                    </li>
                    <!-- Iuran -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('iuran')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('iuran')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('iuran') }}">
                            <div class="flex items-center">
                                <i data-feather="file-text" class="shrink-0 @if(request()->routeIs('iuran')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Iuran</span>
                            </div>
                        </a>
                    </li>
                    @endif

                    @if($user->role === 'petugas')
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('petugas.dashboard')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('petugas.dashboard')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('petugas.dashboard') }}">
                            <div class="flex items-center">
                                <i data-feather="home" class="shrink-0 @if(request()->routeIs('petugas.dashboard')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('petugas.data-nasabah')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('petugas.data-nasabah')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('petugas.data-nasabah') }}">
                            <div class="flex items-center">
                                <i data-feather="users" class="shrink-0 @if(request()->routeIs('petugas.data-nasabah')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Data Nasabah</span>
                            </div>
                        </a>
                    </li>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('petugas.setoran')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('petugas.setoran')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('petugas.setoran') }}">
                            <div class="flex items-center">
                                <i data-feather="dollar-sign" class="shrink-0 @if(request()->routeIs('petugas.setoran')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pengambilan</span>
                            </div>
                        </a>
                    </li>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('petugas.iuran')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('petugas.iuran')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('petugas.iuran') }}">
                            <div class="flex items-center">
                                <i data-feather="file-text" class="shrink-0 @if(request()->routeIs('petugas.iuran')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Iuran</span>
                            </div>
                        </a>
                    </li>
                    @endif

                    @if($user->role === 'nasabah')
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('nasabah.dashboard')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('nasabah.dashboard')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('nasabah.dashboard') }}">
                            <div class="flex items-center">
                                <i data-feather="home" class="shrink-0 @if(request()->routeIs('nasabah.dashboard')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('nasabah.iuran')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('nasabah.iuran')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="{{ route('nasabah.iuran') }}">
                            <div class="flex items-center">
                                <i data-feather="file-text" class="shrink-0 @if(request()->routeIs('nasabah.iuran')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Iuran</span>
                            </div>
                        </a>
                    </li>

                    {{-- Riwayat dropdown --}}
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if(request()->routeIs('nasabah.riwayat.*')){{ 'from-orange-500/[0.12] dark:from-orange-500/[0.24] to-orange-500/[0.04]' }}@endif" x-data="{ open: {{ request()->routeIs('nasabah.riwayat.*') ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!request()->routeIs('nasabah.riwayat.*')){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif" href="#0" @click.prevent="open = !open; sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i data-feather="file-text" class="shrink-0 @if(request()->routeIs('nasabah.riwayat.*')){{ 'text-orange-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16"></i>
                                    <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Riwayat</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 @if(request()->routeIs('nasabah.riwayat.*')){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-8 mt-1 @if(!request()->routeIs('nasabah.riwayat.*')){{ 'hidden' }}@endif" :class="open ? 'block!' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if(Route::is('nasabah.riwayat.pengambilan')){{ 'text-orange-500!' }}@endif" href="{{ route('nasabah.riwayat.pengambilan') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pengambilan</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if(Route::is('nasabah.riwayat.pembelian')){{ 'text-orange-500!' }}@endif" href="{{ route('nasabah.riwayat.pembelian') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pembelian</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="w-12 pl-4 pr-3 py-2">
                <button class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 transition-colors" @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500 sidebar-expanded:rotate-180" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 16a1 1 0 0 1-1-1V1a1 1 0 1 1 2 0v14a1 1 0 0 1-1 1ZM8.586 7H1a1 1 0 1 0 0 2h7.586l-2.793 2.793a1 1 0 1 0 1.414 1.414l4.5-4.5A.997.997 0 0 0 12 8.01M11.924 7.617a.997.997 0 0 0-.217-.324l-4.5-4.5a1 1 0 0 0-1.414 1.414L8.586 7M12 7.99a.996.996 0 0 0-.076-.373Z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>