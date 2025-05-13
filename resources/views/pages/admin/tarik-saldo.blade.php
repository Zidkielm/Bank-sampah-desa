<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{
        showModal: false,
        showDetailModal: false,
        selectedWithdrawal: {},
        items: [{ item_name: '', quantity: '', price: 0, total: 0 }],
        selectedUser: null,
        userBalance: 0,
        cashPayment: 0,
        totalAmount: 0,
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
        },
        calculateItemTotal(index) {
            const quantity = parseFloat(this.items[index].quantity) || 0;
            const price = parseFloat(this.items[index].price) || 0;
            this.items[index].total = quantity * price;
            return this.items[index].total;
        },
        calculateGrandTotal() {
            return this.items.reduce((sum, item) => {
                return sum + (parseFloat(item.total) || 0);
            }, 0);
        },
        async getUserBalance() {
            if (!this.selectedUser) return;
            try {
                const response = await fetch(`{{ route('user-balance', '') }}/${this.selectedUser}`);
                const data = await response.json();
                this.userBalance = parseFloat(data.balance);
                this.updateCashPayment();
            } catch (error) {
                console.error('Error fetching user balance:', error);
            }
        },
        updateCashPayment() {
            const total = this.calculateGrandTotal();
            this.totalAmount = total;

            if (this.userBalance >= total) {
                this.cashPayment = 0;
            } else {
                this.cashPayment = total - this.userBalance;
            }
        },
        addItem() {
            this.items.push({ item_name: '', quantity: '', price: 0, total: 0 });
        },
        removeItem(index) {
            if (this.items.length > 1) {
                this.items.splice(index, 1);
                this.updateCashPayment();
            }
        },
        async getWithdrawalDetails(id) {
            try {
                const response = await fetch(`{{ route('withdrawal.show', '') }}/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                this.selectedWithdrawal = data;
                this.showDetailModal = true;
            } catch (error) {
                console.error('Error fetching withdrawal details:', error);
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
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Tarik Saldo</h1>
            <button @click="showModal = true"
                class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                Tambah Penarikan
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
                            <th class="px-4 py-3">Tgl. Penarikan</th>
                            <th class="px-4 py-3">Nama Nasabah</th>
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
                                    {{ $withdrawal->withdrawal_date->format('d-m-Y') }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $withdrawal->user->name }}
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $withdrawal->formatted_total }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $withdrawal->formatted_amount }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $withdrawal->formatted_cash_amount }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $withdrawal->processor->name }}</td>
                                <td class="px-4 py-4 text-center">
                                    <button
                                        class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 inline-flex items-center justify-center"
                                        @click="getWithdrawalDetails({{ $withdrawal->id }})">
                                        <i data-feather="eye" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">Tidak
                                    ada data penarikan</td>
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

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-4">Cetak laporan penarikan</h2>

            <form action="{{ route('withdrawal.report') }}" method="POST" target="_blank">
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

        @include('pages.admin.detail-withdrawal.detail-modal')
        @include('pages.admin.detail-withdrawal.add-modal')
    </div>
</x-app-layout>
