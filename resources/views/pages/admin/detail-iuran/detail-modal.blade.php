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
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Detail Pembayaran
                                Iuran</h3>
                            <button @click="showDetailModal = false"
                                class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                <i data-feather="x" class="h-6 w-6"></i>
                            </button>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700 py-4">
                            <dl>
                                <div class="grid grid-cols-3 gap-4 py-3">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Pembayaran
                                    </dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedFee.payment_date ? new Date(selectedFee.payment_date).toLocaleDateString('id-ID', {
                                            day: '2-digit',
                                            month: '2-digit',
                                            year: 'numeric'
                                        }) : '-'"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ID Nasabah</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedFee.user?.id"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Nasabah</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedFee.user?.name"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor HP</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedFee.user?.no_hp || '-'"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah Iuran</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="formatPrice(selectedFee.amount)"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Metode Pembayaran
                                    </dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedFee.payment_method === 'cash' ? 'Tunai' : 'Transfer'"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                                    <dd class="text-sm col-span-2">
                                        <span x-show="selectedFee.status === 'paid'"
                                            class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                            Lunas
                                        </span>
                                        <span x-show="selectedFee.status === 'unpaid'"
                                            class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                            Menunggu
                                        </span>
                                        <span x-show="selectedFee.status === 'partial'"
                                            class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                            Ditolak
                                        </span>
                                    </dd>
                                </div>

                                <div x-show="selectedFee.status === 'partial'" class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Alasan Penolakan</dt>
                                    <dd class="text-sm text-red-600 dark:text-red-400 col-span-2" x-text="selectedFee.rejection_reason || '-'"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Penerima</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedFee.receiver?.name"></dd>
                                </div>

                                <div class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Catatan</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2"
                                        x-text="selectedFee.notes || '-'"></dd>
                                </div>

                                <div x-show="selectedFee.proof_image"
                                    class="grid grid-cols-3 gap-4 py-3 border-t border-gray-100 dark:border-gray-700">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Bukti Pembayaran</dt>
                                    <dd class="text-sm text-gray-900 dark:text-gray-200 col-span-2">
                                        <div class="mt-1">
                                            <a :href="selectedFee.proof_image_url" target="_blank"
                                               @click="window.open(selectedFee.proof_image_url, '_blank')"
                                               class="text-orange-500 hover:text-orange-600">
                                                <img :src="selectedFee.proof_image_url" alt="Bukti Pembayaran"
                                                    class="h-24 w-auto object-cover rounded-md border border-gray-200 dark:border-gray-700">
                                            </a>
                                        </div>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <!-- Add approve/reject buttons -->
                <div class="flex space-x-2">
                    <form x-show="selectedFee.status === 'unpaid'" action="{{ route('monthly-fee.approve', '') }}" method="POST" class="inline" x-ref="approveForm">
                        @csrf
                        <button type="button" @click="$refs.approveForm.action = '{{ route('monthly-fee.approve', '') }}/' + selectedFee.id; $refs.approveForm.submit();"
                            class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                            bg-green-500 text-base font-medium text-white hover:bg-green-600
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500
                            dark:focus:ring-offset-gray-800 sm:w-auto sm:text-sm mx-2">
                            Setujui
                        </button>
                    </form>

                    <button x-show="selectedFee.status === 'unpaid'" type="button"
                        @click="showDetailModal = false; showRejectModal = true; rejectFormAction = '{{ route('monthly-fee.reject', '') }}/' + selectedFee.id;"
                        class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                        bg-red-500 text-base font-medium text-white hover:bg-red-600
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500
                        dark:focus:ring-offset-gray-800 sm:w-auto sm:text-sm">
                        Tolak
                    </button>
                </div>

                <button type="button" @click="showDetailModal = false"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600
                    shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300
                    hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                    focus:ring-orange-500 dark:focus:ring-offset-gray-800 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
