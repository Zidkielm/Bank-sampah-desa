<div x-show="showEditModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-800 opacity-70 dark:bg-opacity-80 transition-opacity z-40"></div>

    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0 relative z-50">
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            @click.away="showEditModal = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <form x-bind:action="'{{ route('admin.waste-types.update', '') }}/' + selectedWaste.id" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Edit Sampah
                                </h3>
                                <button type="button" @click="showEditModal = false"
                                    class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <i data-feather="x" class="h-6 w-6"></i>
                                </button>
                            </div>

                            <div class="mb-4">
                                <label for="edit-name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Sampah <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="name" id="edit-name" required
                                    x-model="selectedWaste.name"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white">
                            </div>

                            <div class="mb-4">
                                <label for="edit-price_per_kg"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga per KG
                                    <span class="text-red-500">*</span></label>
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 dark:text-gray-400 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="price_per_kg" id="edit-price_per_kg" required
                                        x-model="selectedWaste.price_per_kg"
                                        class="pl-10 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                        shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                        dark:bg-gray-700 dark:text-white"
                                        step="0.01" min="0">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="edit-image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar <span
                                        class="text-gray-400 dark:text-gray-500">(kosongkan jika tidak ingin
                                        mengubah)</span></label>
                                <input type="file" name="image" id="edit-image" accept="image/*"
                                    class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-orange-50 file:text-orange-700
                                    dark:file:bg-orange-900 dark:file:text-orange-200
                                    hover:file:bg-orange-100 dark:hover:file:bg-orange-800">
                                <div class="mt-2" x-show="selectedWaste.image_path">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Gambar saat ini:</p>
                                    <img :src="'/storage/' + selectedWaste.image_path" :alt="selectedWaste.name"
                                        class="h-24 object-cover rounded">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="edit-description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi <span
                                        class="text-gray-400 dark:text-gray-500">(opsional)</span></label>
                                <textarea name="description" id="edit-description" rows="3" x-model="selectedWaste.description"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan deskripsi sampah"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <div class="mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" id="status-active" name="status" value="active"
                                            x-model="selectedWaste.status"
                                            class="focus:ring-orange-500 h-4 w-4 text-orange-600 border-gray-300 dark:border-gray-600">
                                        <label for="status-active"
                                            class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" id="status-inactive" name="status" value="inactive"
                                            x-model="selectedWaste.status"
                                            class="focus:ring-orange-500 h-4 w-4 text-orange-600 border-gray-300 dark:border-gray-600">
                                        <label for="status-inactive"
                                            class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Tidak Aktif
                                        </label>
                                    </div>
                                </div>
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
                        Simpan Perubahan
                    </button>
                    <button type="button" @click="showEditModal = false"
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
