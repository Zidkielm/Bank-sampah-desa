<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{
        showAddModal: false,
        showDetailModal: false,
        showRejectModal: false,
        selectedFee: {},
        rejectFormAction: '',
        paymentMethod: '',
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
        },
        async getFeeDetails(id) {
            try {
                const response = await fetch(`{{ route('monthly-fee.show', '') }}/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                this.selectedFee = data;
                this.showDetailModal = true;
            } catch (error) {
                console.error('Error fetching fee details:', error);
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
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Iuran Bulanan</h1>
            <div class="flex space-x-2">
                <a href="{{ route('monthly-fee.check-unpaid') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                    <i data-feather="user-check" class="h-4 w-4 inline-block mr-1"></i> Cek Yang Belum Bayar
                </a>
                <button @click="showAddModal = true"
                    class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                    <i data-feather="plus" class="h-4 w-4 inline-block mr-1"></i> Tambah Iuran
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
            <form action="{{ route('iuran') }}" method="GET">
                <div class="flex flex-col md:flex-row md:justify-between gap-4 mb-6">
                    <div class="w-full md:w-1/2">
                        <label for="search"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cari Nasabah</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i data-feather="search" class="w-4 h-4 text-gray-400"></i>
                            </div>
                            <input type="text" name="search" id="search"
                                class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm rounded-lg pl-10 p-2.5 w-full"
                                placeholder="Masukkan nama" value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:flex-row md:justify-end gap-4">
                        <div class="w-full md:w-2/3">
                            <label for="month"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bulan</label>
                            <input type="month" name="month" id="month"
                                class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm rounded-lg p-2.5 w-full"
                                value="{{ request('month', date('Y-m')) }}">
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2.5 px-4 rounded-lg transition-colors">
                                <i data-feather="filter" class="h-4 w-4 inline-block mr-1"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-600 dark:text-gray-300">
                            <th class="px-4 py-3 rounded-l-lg">No.</th>
                            <th class="px-4 py-3">Nama Nasabah</th>
                            <th class="px-4 py-3">Tgl. Pembayaran</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Metode</th>
                            <th class="px-4 py-3">Penerima</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($monthlyFees as $index => $fee)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $monthlyFees->firstItem() + $index }}
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $fee->user->name }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $fee->payment_date ? $fee->payment_date->format('d-m-Y') : '-' }}
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    Rp {{ number_format($fee->amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $fee->payment_method === 'cash' ? 'Tunai' : 'Transfer' }}
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">
                                    {{ $fee->receiver ? $fee->receiver->name : '-' }}
                                </td>
                                <td class="px-4 py-4">
                                    @if ($fee->status === 'paid')
                                        <span
                                            class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                            Lunas
                                        </span>
                                    @elseif ($fee->status === 'pending')
                                        <span
                                            class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                            Menunggu
                                        </span>
                                    @elseif ($fee->status === 'partial')
                                        <span
                                            class="px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                            Ditolak
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 text-xs font-medium text-orange-800 bg-orange-100 rounded-full">
                                            Menunggu
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    <button class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700"
                                        @click="getFeeDetails({{ $fee->id }})">
                                        <i data-feather="eye" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data iuran
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ $monthlyFees->firstItem() ?? 0 }} to {{ $monthlyFees->lastItem() ?? 0 }} of
                    {{ $monthlyFees->total() ?? 0 }}
                </p>
                <div class="flex space-x-1">
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ $monthlyFees->onFirstPage() ? 'disabled' : '' }}
                        onclick="window.location='{{ $monthlyFees->previousPageUrl() }}'">
                        <i data-feather="chevron-left" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                    <button
                        class="p-2 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700"
                        {{ !$monthlyFees->hasMorePages() ? 'disabled' : '' }}
                        onclick="window.location='{{ $monthlyFees->nextPageUrl() }}'">
                        <i data-feather="chevron-right" class="h-5 w-5 text-gray-500 dark:text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-4">Tata Cara Pembayaran Iuran Bulanan
            </h2>

            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <ol class="list-decimal pl-5 text-gray-600 dark:text-gray-400 space-y-2">
                    <li>Isi tanggal pembayaran</li>
                    <li>Pilih metode pembayaran</li>
                    <li>Jika transfer, kirim ke rekening BCA 1452671451 a.n. Nur Hartanto</li>
                    <li>Jika tunai, nasabah hanya perlu memberikan uang kepada petugas</li>
                    <li>Upload file foto bukti pembayaran</li>
                    <li>Klik simpan</li>
                </ol>
            </div>
        </div>

        @include('pages.admin.detail-iuran.detail-modal')
        @include('pages.admin.detail-iuran.add-modal')
        @include('pages.admin.detail-iuran.rejection-modal')
    </div>
</x-app-layout>
