<div x-show="showDetailModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-800 opacity-70 dark:opacity-80 transition-opacity z-40"></div>

    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0 relative z-50">
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            @click.away="showDetailModal = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="w-full">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">
                                Detail Pengambilan Sampah</h3>
                            <button type="button" @click="showDetailModal = false"
                                class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                <i data-feather="x" class="h-6 w-6"></i>
                            </button>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 rounded-md p-4 mb-4 space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">ID Transaksi:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="selectedDeposit.id ? `#${selectedDeposit.id}` : '-'"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Tanggal:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="formatDate(selectedDeposit.deposit_date)"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Jenis Sampah:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="selectedDeposit.waste_type?.name || '-'"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Berat:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="selectedDeposit.weight_kg ? `${selectedDeposit.weight_kg} kg` : '-'"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Harga per Kg:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="formatPrice(selectedDeposit.price_per_kg)"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Total:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="formatPrice(selectedDeposit.total_amount)"></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Diterima Oleh:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="selectedDeposit.receiver?.name || '-'"></span>
                            </div>
                            <div class="flex justify-between items-center" x-show="selectedDeposit.notes">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Catatan:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100"
                                    x-text="selectedDeposit.notes || '-'"></span>
                            </div>
                        </div>

                        <div class="border-t dark:border-gray-700 pt-4">
                            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Informasi Saldo</h4>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-md p-4 space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Saldo Setelah Transaksi:</span>
                                    <span class="text-sm font-medium text-green-600 dark:text-green-400"
                                        x-text="selectedDeposit.transaction ? formatPrice(selectedDeposit.transaction.balance_after) : '-'"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" @click="showDetailModal = false"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                    bg-gray-500 text-base font-medium text-white hover:bg-gray-600
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500
                    dark:focus:ring-offset-gray-800 sm:ml-3 sm:w-auto sm:text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
