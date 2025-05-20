<div x-show="showRejectModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-800 opacity-70 dark:bg-opacity-80 transition-opacity z-40"></div>

    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0 relative z-50">
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            @click.away="showRejectModal = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <form :action="rejectFormAction" method="POST">
                @csrf
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">
                                    Alasan Penolakan</h3>
                                <button @click="showRejectModal = false" type="button"
                                    class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <i data-feather="x" class="h-6 w-6"></i>
                                </button>
                            </div>

                            <div class="mb-4">
                                <label for="rejection_reason"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Alasan Penolakan <span class="text-red-500">*</span>
                                </label>
                                <textarea id="rejection_reason" name="rejection_reason" rows="3" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                     shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                     dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan alasan penolakan pembayaran"></textarea>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    Alasan penolakan akan ditampilkan kepada nasabah
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                        bg-red-500 text-base font-medium text-white hover:bg-red-600
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500
                        dark:focus:ring-offset-gray-800 sm:ml-3 sm:w-auto sm:text-sm">
                        Tolak Pembayaran
                    </button>
                    <button type="button" @click="showRejectModal = false"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600
                        shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300
                        hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-orange-500 dark:focus:ring-offset-gray-800 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
