<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{
        showDetailModal: false,
        selectedDeposit: {},
        formatDate(dateString) {
            if (!dateString) return '-';
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
        },
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
        },
        async getDepositDetails(id) {
            try {
                const response = await fetch(`{{ route('nasabah.riwayat.pengambilan.show', '') }}/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.json();
                this.selectedDeposit = data;
                this.showDetailModal = true;
            } catch (error) {
                console.error('Error fetching deposit details:', error);
            }
        }
    }">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Riwayat</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-4">Riwayat Pengambilan Sampah</h2>

            <div class="mb-6">
                <form action="{{ route('nasabah.riwayat.pengambilan') }}" method="GET">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i data-feather="search" class="w-4 h-4 text-gray-400"></i>
                        </div>
                        <input type="text" name="search"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm rounded-full pl-10 p-2.5 w-full md:w-80"
                            placeholder="Cari riwayat..." value="{{ request('search') }}">
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-600 dark:text-gray-300">
                            <th class="px-4 py-3 rounded-l-lg">No.</th>
                            <th class="px-4 py-3">Tgl. Pengambilan</th>
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
                                    {{ $deposit->deposit_date ? $deposit->deposit_date->format('d-m-Y') : '-' }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $deposit->wasteType->name }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ number_format($deposit->weight_kg, 2) }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    Rp {{ number_format($deposit->total_amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $deposit->receiver->name ?? '-' }}</td>
                                <td class="px-4 py-4">
                                    <button class="p-1 rounded-full bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600"
                                        @click="getDepositDetails({{ $deposit->id }})">
                                        <i data-feather="eye" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data pengambilan sampah
                                </td>
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

        @include('pages.nasabah.detail-riwayat.pengambilan-modal')
    </div>
</x-app-layout>
