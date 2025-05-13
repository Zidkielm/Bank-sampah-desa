<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{
        showModal: false,
        showDetailModal: false,
        selectedDeposit: {},
        wasteItems: [{ waste_type_id: '', weight_kg: '', price_per_kg: 0, total: 0 }],
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
        },
        calculateItemTotal(index) {
            const weight = parseFloat(this.wasteItems[index].weight_kg) || 0;
            const price = parseFloat(this.wasteItems[index].price_per_kg) || 0;
            this.wasteItems[index].total = weight * price;
            return this.wasteItems[index].total;
        },
        calculateGrandTotal() {
            return this.wasteItems.reduce((sum, item) => {
                return sum + (parseFloat(item.total) || 0);
            }, 0);
        },
        async getWasteTypePrice(index) {
            if (!this.wasteItems[index].waste_type_id) return;
            try {
                const response = await fetch(`{{ route('petugas.waste-type-price', '') }}/${this.wasteItems[index].waste_type_id}`);
                const data = await response.json();
                this.wasteItems[index].price_per_kg = data.price_per_kg;
                this.calculateItemTotal(index);
            } catch (error) {
                console.error('Error fetching waste type price:', error);
            }
        },
        addWasteItem() {
            this.wasteItems.push({ waste_type_id: '', weight_kg: '', price_per_kg: 0, total: 0 });
        },
        removeWasteItem(index) {
            if (this.wasteItems.length > 1) {
                this.wasteItems.splice(index, 1);
            }
        },
        async getDepositDetails(id) {
            try {
                const response = await fetch(`{{ route('petugas.deposit.show', '') }}/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                this.selectedDeposit = data;
                this.showDetailModal = true;
            } catch (error) {
                console.error('Error fetching deposit details:', error);
            }
        }
    }">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <div class="flex">
                    <div class="py-1"><i data-feather="check-circle" class="h-5 w-5 text-green-500 mr-3"></i></div>
                    <div>{{ session('success') }}</div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                <div class="flex">
                    <div class="py-1"><i data-feather="alert-circle" class="h-5 w-5 text-red-500 mr-3"></i></div>
                    <div>{{ session('error') }}</div>
                </div>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Setoran</h1>
            <button @click="showModal = true"
                class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                Tambah Setoran
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
            <div class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i data-feather="search" class="w-4 h-4 text-gray-400"></i>
                    </div>
                    <input type="text"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm rounded-full pl-10 p-2.5 w-full md:w-80"
                        placeholder="Masukkan nama">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-600 dark:text-gray-300">
                            <th class="px-4 py-3 rounded-l-lg">No.</th>
                            <th class="px-4 py-3">Tgl. Setoran</th>
                            <th class="px-4 py-3">Nama Nasabah</th>
                            <th class="px-4 py-3">Jenis Sampah</th>
                            <th class="px-4 py-3">Berat (KG)</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Penerima</th>
                            <th class="px-4 py-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($deposits as $index => $deposit)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $deposits->firstItem() + $index }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $deposit->deposit_date->format('d-m-Y') }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $deposit->user->name }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $deposit->wasteType->name }}
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $deposit->formatted_weight }}
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $deposit->formatted_total }}
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $deposit->receiver->name }}
                                </td>
                                <td class="px-4 py-4">
                                    <button class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                                        @click="getDepositDetails({{ $deposit->id }})">
                                        <i data-feather="eye" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">Tidak
                                    ada data setoran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ $deposits->firstItem() ?? 0 }} to {{ $deposits->lastItem() ?? 0 }} of
                    {{ $deposits->total() ?? 0 }}
                </p>
                <div class="flex space-x-1">
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ $deposits->onFirstPage() ? 'disabled' : '' }}
                        onclick="window.location='{{ $deposits->previousPageUrl() }}'">
                        <i data-feather="chevron-left" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ !$deposits->hasMorePages() ? 'disabled' : '' }}
                        onclick="window.location='{{ $deposits->nextPageUrl() }}'">
                        <i data-feather="chevron-right" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-4">Cetak laporan setoran sampah</h2>

            <form action="{{ route('petugas.deposit.report') }}" method="POST" target="_blank">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="start_date" class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Tanggal
                            awal</label>
                        <input type="date" id="start_date" name="start_date"
                            class="w-full p-2.5 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300"
                            required>
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm text-gray-500 dark:text-gray-400 mb-1">Tanggal
                            akhir</label>
                        <input type="date" id="end_date" name="end_date"
                            class="w-full p-2.5 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300"
                            required>
                    </div>
                </div>

                <button type="submit"
                    class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-15 rounded-lg transition-colors w-full md:w-auto">
                    Cetak
                </button>
            </form>
        </div>

        @include('pages.petugas.detail-setoran.detail-modal')
        @include('pages.petugas.detail-setoran.add-modal')
    </div>
</x-app-layout>
