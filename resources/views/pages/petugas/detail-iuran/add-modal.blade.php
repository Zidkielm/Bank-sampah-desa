<div x-show="showAddModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-800 opacity-70 dark:opacity-80 transition-opacity z-40"></div>

    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0 relative z-50">
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            @click.away="showAddModal = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <form action="{{ route('petugas.monthly-fee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Tambah
                                    Pembayaran Iuran</h3>
                                <button type="button" @click="showAddModal = false"
                                    class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <i data-feather="x" class="h-6 w-6"></i>
                                </button>
                            </div>

                            <div class="mb-4">
                                <label for="user_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nasabah <span
                                        class="text-red-500">*</span></label>
                                <select id="user_id" name="user_id" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white">
                                    <option value="">Pilih nasabah</option>
                                    @foreach ($nasabahUsers as $nasabah)
                                    <option value="{{ $nasabah->id }}">{{ $nasabah->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="payment_date"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Pembayaran
                                    <span class="text-red-500">*</span></label>
                                <input type="date" id="payment_date" name="payment_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="mb-4">
                                <label for="amount"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Iuran
                                    <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 dark:text-gray-400 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" id="amount" name="amount" required min="1000"
                                        step="500"
                                        class="pl-10 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                        shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                        dark:bg-gray-700 dark:text-white"
                                        value="25000">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="payment_method"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Metode Pembayaran
                                    <span class="text-red-500">*</span></label>
                                <select id="payment_method" name="payment_method" required x-model="paymentMethod"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white">
                                    <option value="">Pilih metode</option>
                                    <option value="cash">Tunai</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="proof_image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bukti Pembayaran
                                    <span class="text-red-500">*</span></label>
                                <input type="file" id="proof_image" name="proof_image"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    accept="image/*">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, PNG. Max size: 2MB
                                </p>
                            </div>

                            <div class="mb-4">
                                <label for="notes"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catatan <span
                                        class="text-gray-400 dark:text-gray-500">(opsional)</span></label>
                                <textarea id="notes" name="notes" rows="2"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    placeholder="Tambahkan catatan jika diperlukan"></textarea>
                            </div>

                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg mb-4">
                                <h4 class="font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Tata Cara
                                    Pembayaran:</h4>
                                <ol class="list-decimal pl-5 text-sm text-grey-600 dark:text-gray-400 space-y-1">
                                    <li>Isi tanggal pembayaran</li>
                                    <li>Pilih metode pembayaran</li>
                                    <li>Jika transfer, kirim ke rekening BCA 1452671451 a.n. Nur Hartanto</li>
                                    <li>Jika tunai, nasabah hanya perlu memberikan uang kepada petugas</li>
                                    <li>Upload file foto bukti pembayaran (jika transfer)</li>
                                    <li>Klik simpan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                        bg-orange-500 text-base font-medium text-white hover:bg-orange-600
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                        dark:focus:ring-offset-gray-800 sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" @click="showAddModal = false"
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