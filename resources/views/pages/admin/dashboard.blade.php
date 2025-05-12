<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard Admin</h1>
            </div>

            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <x-dropdown-filter align="right" />

                <x-datepicker />

                <button
                    class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Add View</span>
                </button>

            </div>

        </div>

        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 sm:col-span-4 xl:col-span-3">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="ml-5 mr-auto">
                            <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Nasabah</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">1,000</p>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 bg-green-500 rounded-2xl">
                            <i data-feather="users" class="text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 xl:col-span-3">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="ml-5 mr-auto">
                            <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Petugas</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">50</p>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 bg-blue-500 rounded-2xl">
                            <i data-feather="user-check" class="text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 xl:col-span-3">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="ml-5 mr-auto">
                            <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Sampah</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">10,000 kg</p>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 bg-yellow-500 rounded-2xl">
                            <i data-feather="trash" class="text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 xl:col-span-3">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="ml-5 mr-auto">
                            <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Transaksi Setoran</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">500</p>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 bg-red-500 rounded-2xl">
                            <i data-feather="arrow-up" class="text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 xl:col-span-3">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="ml-5 mr-auto">
                            <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Saldo Nasabah</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">Rp. 1,000,000</p>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 bg-purple-500 rounded-2xl">
                            <i data-feather="dollar-sign" class="text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 xl:col-span-3">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="ml-5 mr-auto">
                            <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Iuran Bulanan</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">Rp. 500,000</p>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 bg-orange-500 rounded-2xl">
                            <i data-feather="calendar" class="text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
