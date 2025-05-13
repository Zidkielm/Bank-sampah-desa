<div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-800 opacity-70 dark:opacity-80 transition-opacity z-40"></div>

    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0 relative z-50">
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            @click.away="showModal = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <form action="{{ route('petugas.deposit.store') }}" method="POST">
                @csrf
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Tambah
                                    Setoran</h3>
                                <button type="button" @click="showModal = false"
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
                                <label for="deposit_date"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Setoran
                                    <span class="text-red-500">*</span></label>
                                <input type="date" id="deposit_date" name="deposit_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="mb-4">
                                <div class="flex justify-between mb-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Daftar
                                        Sampah <span class="text-red-500">*</span></label>
                                    <button type="button" @click="addWasteItem()"
                                        class="text-orange-500 hover:text-orange-600 focus:outline-none text-sm flex items-center">
                                        <i data-feather="plus-circle" class="h-4 w-4 mr-1"></i> Tambah Sampah
                                    </button>
                                </div>

                                <template x-for="(item, index) in wasteItems" :key="index">
                                    <div class="p-3 mb-3 border border-gray-200 dark:border-gray-700 rounded-lg">
                                        <div class="flex justify-between items-center mb-2">
                                            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300">Item #<span
                                                    x-text="index + 1"></span></h4>
                                            <button type="button" @click="removeWasteItem(index)"
                                                class="text-gray-400 hover:text-gray-500 focus:outline-none"
                                                x-show="wasteItems.length > 1">
                                                <i data-feather="trash-2" class="h-4 w-4"></i>
                                            </button>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                                            <div>
                                                <label
                                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Jenis
                                                    Sampah <span class="text-red-500">*</span></label>
                                                <select :name="'items[' + index + '][waste_type_id]'"
                                                    x-model="item.waste_type_id" @change="getWasteTypePrice(index)"
                                                    required
                                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600
                                                    text-sm shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                                    dark:bg-gray-700 dark:text-white">
                                                    <option value="">Pilih jenis sampah</option>
                                                    @foreach ($wasteTypes as $wasteType)
                                                        <option value="{{ $wasteType->id }}">{{ $wasteType->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Berat
                                                    (KG) <span class="text-red-500">*</span></label>
                                                <input type="number" :name="'items[' + index + '][weight_kg]'"
                                                    x-model="item.weight_kg" @input="calculateItemTotal(index)"
                                                    step="0.01" min="0.01" required
                                                    class="block w-full rounded-md border-gray-300 dark:border-gray-600
                                                    text-sm shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                                    dark:bg-gray-700 dark:text-white">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label
                                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Harga
                                                    per KG</label>
                                                <div class="relative">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <span
                                                            class="text-gray-500 dark:text-gray-400 sm:text-sm">Rp</span>
                                                    </div>
                                                    <input type="number" x-model="item.price_per_kg" readonly
                                                        class="pl-10 block w-full rounded-md border-gray-300 dark:border-gray-600
                                                        text-sm shadow-sm bg-gray-50 dark:bg-gray-600
                                                        dark:text-white">
                                                </div>
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Total
                                                    Harga</label>
                                                <div class="relative">
                                                    <div
                                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <span
                                                            class="text-gray-500 dark:text-gray-400 sm:text-sm">Rp</span>
                                                    </div>
                                                    <input type="number" :value="calculateItemTotal(index)" readonly
                                                        class="pl-10 block w-full rounded-md border-gray-300 dark:border-gray-600
                                                        text-sm shadow-sm bg-gray-50 dark:bg-gray-600 font-medium
                                                        dark:text-white">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <div class="mt-4 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Total
                                            Setoran</span>
                                        <span x-text="formatPrice(calculateGrandTotal())"
                                            class="text-lg font-semibold text-gray-800 dark:text-gray-100"></span>
                                    </div>
                                </div>
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
                    <button type="button" @click="showModal = false"
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
