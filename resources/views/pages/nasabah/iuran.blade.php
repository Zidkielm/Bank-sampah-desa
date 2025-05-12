<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Iuran Bulanan</h1>
            <button class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                Tambah Iuran
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-full pl-10 p-2.5 w-full md:w-80" placeholder="Masukkan nama">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 text-left text-gray-600">
                            <th class="px-4 py-3 rounded-l-lg">No.</th>
                            <th class="px-4 py-3">Nama nasabah</th>
                            <th class="px-4 py-3">Tgl. pembayaran</th>
                            <th class="px-4 py-3">Metode</th>
                            <th class="px-4 py-3">Penerima</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 rounded-r-lg">Foto Bukti</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4">001</td>
                            <td class="px-4 py-4">Indra herlambang</td>
                            <td class="px-4 py-4">12/05/2023</td>
                            <td class="px-4 py-4">Transfer</td>
                            <td class="px-4 py-4">Admin Pusat</td>
                            <td class="px-4 py-4">
                                <span class="px-3 py-1 text-white bg-emerald-500 rounded-full text-xs">Lunas</span>
                            </td>
                            <td class="px-4 py-4 text-center">
                                <button class="p-1 rounded-lg hover:bg-gray-100 inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4">002</td>
                            <td class="px-4 py-4">Hesti rahmawati</td>
                            <td class="px-4 py-4">15/05/2023</td>
                            <td class="px-4 py-4">Tunai</td>
                            <td class="px-4 py-4">Ahmad Rizal</td>
                            <td class="px-4 py-4">
                                <span class="px-3 py-1 text-white bg-emerald-500 rounded-full text-xs">Lunas</span>
                            </td>
                            <td class="px-4 py-4 text-center">
                                <button class="p-1 rounded-lg hover:bg-gray-100 inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4">003</td>
                            <td class="px-4 py-4">Rahmat susanto</td>
                            <td class="px-4 py-4">-</td>
                            <td class="px-4 py-4">-</td>
                            <td class="px-4 py-4">-</td>
                            <td class="px-4 py-4">
                                <span class="px-3 py-1 text-white bg-pink-500 rounded-full text-xs">Belum bayar</span>
                            </td>
                            <td class="px-4 py-4 text-center">
                                <button class="p-1 rounded-lg hover:bg-gray-100 inline-flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-500">Showing 1-09 of 78</p>
                <div class="flex space-x-1">
                    <button class="p-2 border rounded-lg hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="p-2 border rounded-lg hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
