<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{
        showModal: false,
        showDetailModal: false,
        showEditModal: false,
        showDeleteModal: false,
        selectedWaste: {},
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
        }
    }">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Data Sampah</h1>
            <button @click="showModal = true" class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                Tambah Data Sampah
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
            <div class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i data-feather="search" class="w-4 h-4 text-gray-400"></i>
                    </div>
                    <input type="text" class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm rounded-full pl-10 p-2.5 w-full md:w-80" placeholder="Masukkan nama">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-600 dark:text-gray-300">
                            <th class="px-4 py-3 rounded-l-lg">No.</th>
                            <th class="px-4 py-3">Nama Sampah</th>
                            <th class="px-4 py-3">Harga per KG</th>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($wasteTypes as $index => $waste)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $wasteTypes->firstItem() + $index }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $waste->name }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ 'Rp ' . number_format($waste->price_per_kg, 0, ',', '.') }}</td>
                                <td class="px-4 py-4">
                                    @if($waste->image_path)
                                        <img src="{{ asset('storage/' . $waste->image_path) }}" alt="{{ $waste->name }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center">
                                            <i data-feather="image" class="w-8 h-8 text-gray-400 dark:text-gray-500"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    @if($waste->status === 'active')
                                        <span class="inline-flex px-3 py-1 text-xs text-white bg-emerald-500 rounded-full">Aktif</span>
                                    @else
                                        <span class="inline-flex px-3 py-1 text-xs text-white bg-pink-500 rounded-full">Tidak aktif</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex space-x-2">
                                        <button class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                                            title="Detail"
                                            @click="selectedWaste = {{ $waste->toJson() }}; showDetailModal = true">
                                            <i data-feather="eye" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                                        </button>
                                        <button class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                                            title="Edit"
                                            @click="selectedWaste = {{ $waste->toJson() }}; showEditModal = true">
                                            <i data-feather="edit" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                                        </button>
                                        <button class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                                            title="Delete"
                                            @click="selectedWaste = {{ $waste->toJson() }}; showDeleteModal = true">
                                            <i data-feather="trash-2" class="h-5 w-5 text-red-500"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">Tidak ada data sampah</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ $wasteTypes->firstItem() ?? 0 }} to {{ $wasteTypes->lastItem() ?? 0 }} of
                    {{ $wasteTypes->total() ?? 0 }}
                </p>
                <div class="flex space-x-1">
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ $wasteTypes->onFirstPage() ? 'disabled' : '' }}
                        onclick="window.location='{{ $wasteTypes->previousPageUrl() }}'">
                        <i data-feather="chevron-left" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ !$wasteTypes->hasMorePages() ? 'disabled' : '' }}
                        onclick="window.location='{{ $wasteTypes->nextPageUrl() }}'">
                        <i data-feather="chevron-right" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>

        @include('pages.admin.detail-data-sampah.add-sampah-modal')
        @include('pages.admin.detail-data-sampah.view-sampah-modal')
        @include('pages.admin.detail-data-sampah.edit-sampah-modal')
        @include('pages.admin.detail-data-sampah.delete-sampah-modal')
    </div>
</x-app-layout>
