<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Nasabah Yang Belum Bayar Iuran</h1>
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Pemeriksaan terakhir: {{ $now->format('d M Y H:i') }}</span>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <div class="flex">
                    <div class="py-1"><i data-feather="check-circle" class="h-5 w-5 text-green-500 mr-3"></i></div>
                    <div>{{ session('success') }}</div>
                </div>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-4">Nasabah Yang Belum Membayar Bulan Ini ({{ $now->format('F Y') }})</h2>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-600 dark:text-gray-300">
                            <th class="px-4 py-3 rounded-l-lg">No.</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Nomor HP</th>
                            <th class="px-4 py-3">Jumlah Bulan Tertunggak</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($unpaidUsers as $index => $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 {{ in_array($user, $deactivated) ? 'bg-red-50 dark:bg-red-900/10' : '' }}">
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $index + 1 }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $user->name }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $user->no_hp ?? '-' }}</td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $user->unpaid_months }}</td>
                                <td class="px-4 py-4">
                                    @if($user->status === 'active')
                                        <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Active</span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    <button class="text-orange-500 hover:underline" @click="showAddModal = true; selectedUserId = {{ $user->id }}">
                                        Tambah Pembayaran
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">Semua nasabah telah membayar untuk bulan ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(count($deactivated) > 0)
            <div class="bg-red-50 dark:bg-red-900/10 rounded-lg shadow-sm p-6 mb-6 border border-red-200 dark:border-red-700">
                <h2 class="text-lg font-medium text-red-800 dark:text-red-300 mb-4">Nasabah Yang Dinonaktifkan (Tunggakan > 2 Bulan)</h2>
                <p class="text-sm text-red-700 dark:text-red-400 mb-4">{{ count($deactivated) }} nasabah telah dinonaktifkan karena menunggak lebih dari 2 bulan.</p>

                <ul class="list-disc pl-5 text-red-700 dark:text-red-400 space-y-1">
                    @foreach($deactivated as $user)
                        <li>{{ $user->name }} ({{ $user->unpaid_months }} bulan)</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>
