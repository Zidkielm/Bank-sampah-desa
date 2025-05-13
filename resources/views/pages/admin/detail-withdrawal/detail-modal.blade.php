<div x-show="showDetailModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-800 opacity-70 dark:bg-opacity-80 transition-opacity z-40"></div>

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
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Detail Penarikan
                            </h3>
                            <button @click="showDetailModal = false"
                                class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                <i data-feather="x" class="h-6 w-6"></i>
                            </button>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700 py-4">
                            <dl>
                                <div class="grid grid-cols-3 gap-4 py-3">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Penarikan
                                    </dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.withdrawal_date"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Nasabah</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.user?.name"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor HP</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.user?.no_hp || '-'"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Petugas</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.processor?.name"></dd>
                                </div>

                                <div class="border-t border-gray-100 dark:border-gray-700 py-3">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Detail Barang
                                    </dt>
                                    <dd class="mt-1">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                        Item</th>
                                                    <th
                                                        class="px-3 py-2 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                        Qty</th>
                                                    <th
                                                        class="px-3 py-2 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                        Harga</th>
                                                    <th
                                                        class="px-3 py-2 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                <template x-for="(item, index) in selectedWithdrawal.items"
                                                    :key="index">
                                                    <tr>
                                                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200"
                                                            x-text="item.item_name"></td>
                                                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200 text-right"
                                                            x-text="item.quantity"></td>
                                                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200 text-right"
                                                            x-text="formatPrice(item.price)"></td>
                                                        <td class="px-3 py-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200 text-right"
                                                            x-text="formatPrice(item.total_amount)"></td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Belanja</dt>
                                    <dd class="text-sm font-semibold text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.formatted_total || formatPrice(selectedWithdrawal.total_amount)">
                                    </dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Dari Saldo</dt>
                                    <dd class="text-sm font-semibold text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.formatted_amount || formatPrice(selectedWithdrawal.amount)">
                                    </dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Pembayaran Tunai
                                    </dt>
                                    <dd class="text-sm font-semibold text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.formatted_cash_amount || formatPrice(selectedWithdrawal.cash_amount)">
                                    </dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Catatan</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedWithdrawal.notes || '-'"></dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" @click="showDetailModal = false"
                    class="w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600
                    shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300
                    hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                    focus:ring-orange-500 dark:focus:ring-offset-gray-800 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
