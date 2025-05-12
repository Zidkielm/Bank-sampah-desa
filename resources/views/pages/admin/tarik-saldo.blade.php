<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tarik Saldo</h1>
            <button class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                Tambah Penarikan
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
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
                            <th class="px-4 py-3">Tgl. Setoran</th>
                            <th class="px-4 py-3">Nama nasabah</th>
                            <th class="px-4 py-3">Berat (KG)</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Penerima</th>
                            <th class="px-4 py-3 rounded-r-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4">001</td>
                            <td class="px-4 py-4">04-04-2025</td>
                            <td class="px-4 py-4">Indra herlambang</td>
                            <td class="px-4 py-4">1</td>
                            <td class="px-4 py-4">Rp 10.000</td>
                            <td class="px-4 py-4">Petugas</td>
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
                            <td class="px-4 py-4">10-05-2025</td>
                            <td class="px-4 py-4">Hesti rahmawati</td>
                            <td class="px-4 py-4">12</td>
                            <td class="px-4 py-4">Rp 25.000</td>
                            <td class="px-4 py-4">Petugas</td>
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
                            <td class="px-4 py-4">11-02-2025</td>
                            <td class="px-4 py-4">Rahmat susanto</td>
                            <td class="px-4 py-4">5</td>
                            <td class="px-4 py-4">Rp 30.000</td>
                            <td class="px-4 py-4">Petugas</td>
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
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Cetak laporan penarikan</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="tanggal_awal" class="block text-sm text-gray-500 mb-1">Tanggal awal</label>
                    <input
                        type="text"
                        id="tanggal_awal"
                        class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700"
                        placeholder="DD-MM-YYYY"
                        value="01-04-2025"
                    >
                </div>
                <div>
                    <label for="tanggal_akhir" class="block text-sm text-gray-500 mb-1">Tanggal akhir</label>
                    <input
                        type="text"
                        id="tanggal_akhir"
                        class="w-full p-2.5 bg-gray-50 border border-gray-200 rounded-lg text-gray-700"
                        placeholder="DD-MM-YYYY"
                        value="30-04-2025"
                    >
                </div>
            </div>

            <button class="bg-orange-400 hover:bg-orange-500 text-white font-medium py-2 px-15 rounded-lg transition-colors w-full md:w-auto">
                Cetak
            </button>
        </div>
    </div>
</x-app-layout>
