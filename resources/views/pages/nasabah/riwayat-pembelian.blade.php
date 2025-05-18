<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{
        showDetailModal: false,
        selectedWithdrawal: {},
        formatDate(dateString) {
            if (!dateString) return '-';
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
        },
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
        },
        async getWithdrawalDetails(id) {
            try {
                const response = await fetch(`{{ route('nasabah.riwayat.pembelian.show', '') }}/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.json();
                this.selectedWithdrawal = data;
                this.showDetailModal = true;
            } catch (error) {
                console.error('Error fetching withdrawal details:', error);
            }
        }
    }">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Riwayat</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-4">Riwayat Pembelian</h2>

            <div class="mb-6">
                <form action="{{ route('nasabah.riwayat.pembelian') }}" method="GET">
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
                            <th class="px-4 py-3">Tgl. Pembelian</th>
                            <th class="px-4 py-3">Total Belanja</th>
                            <th class="px-4 py-3">Dari Saldo</th>
                            <th class="px-4 py-3">Tunai</th>
                            <th class="px-4 py-3">Petugas</th>
                            <th class="px-4 py-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($withdrawals as $index => $withdrawal)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $withdrawals->firstItem() + $index }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $withdrawal->withdrawal_date ? $withdrawal->withdrawal_date->format('d-m-Y') : '-' }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    Rp {{ number_format($withdrawal->total_amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    Rp {{ number_format($withdrawal->amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    Rp {{ number_format($withdrawal->cash_amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $withdrawal->processor->name ?? '-' }}</td>
                                <td class="px-4 py-4">
                                    <button class="p-1 rounded-full bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600"
                                        @click="getWithdrawalDetails({{ $withdrawal->id }})">
                                        <i data-feather="eye" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data pembelian
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ $withdrawals->firstItem() ?? 0 }} to {{ $withdrawals->lastItem() ?? 0 }} of
                    {{ $withdrawals->total() ?? 0 }}
                </p>
                <div class="flex space-x-1">
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ $withdrawals->onFirstPage() ? 'disabled' : '' }}
                        onclick="window.location='{{ $withdrawals->previousPageUrl() }}'">
                        <i data-feather="chevron-left" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ !$withdrawals->hasMorePages() ? 'disabled' : '' }}
                        onclick="window.location='{{ $withdrawals->nextPageUrl() }}'">
                        <i data-feather="chevron-right" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>

        @include('pages.nasabah.detail-riwayat.pembelian-modal')
    </div>
</x-app-layout>
