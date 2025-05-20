<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{
        getNearestSunday() {
                const today = new Date();
                const dayOfWeek = today.getDay(); // 0 for Sunday, 1 for Monday, etc.
                const daysToSunday = (7 - dayOfWeek) % 7; // 0 if today is Sunday, otherwise days until next Sunday

                const sunday = new Date(today);
                sunday.setDate(today.getDate() + daysToSunday);

                const day = String(sunday.getDate()).padStart(2, '0');
                const month = String(sunday.getMonth() + 1).padStart(2, '0');
                const year = sunday.getFullYear();

                return `${day}-${month}-${year}`;
            },
            sendWhatsAppNotification() {
                const sundayDate = this.getNearestSunday();
                const userAddress = '{{ Auth::user()->alamat }}';
                const userName = '{{ Auth::user()->name }}';
                const message = `Halo, saya ${userName} ingin memberitahukan bahwa ada barang rongsok yang bisa diambil pada hari Minggu tanggal ${sundayDate}.\n\nAlamat pengambilan: ${userAddress}\n\nTerima kasih.`;
                const encodedMessage = encodeURIComponent(message);
                const phoneNumber = '{{ env('PETUGAS_WHATSAPP_NUMBER', '6281259043970') }}';

                window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
            }
    }">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard Nasabah</h1>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-8">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6">
                        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5 h-full">
                            <div class="flex items-center">
                                <div class="ml-5 mr-auto">
                                    <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Saldo</h2>
                                    <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">Rp.
                                        {{ number_format($totalSaldoUser, 0, ',', '.') }}</p>
                                </div>
                                <div class="flex items-center justify-center w-10 h-10 bg-yellow-500 rounded-2xl">
                                    <i data-feather="dollar-sign" class="text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5 h-full">
                            <div class="flex items-center">
                                <div class="ml-5 mr-auto">
                                    <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Status Akun</h2>
                                    <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">
                                        {{ $statusAkun }}</p>
                                </div>
                                <div class="flex items-center justify-center w-10 h-10 bg-red-500 rounded-2xl">
                                    <i data-feather="shield" class="text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5 h-full">
                            <div class="flex items-center">
                                <div class="ml-5 mr-auto">
                                    <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Pengambilan
                                    </h2>
                                    <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">
                                        {{ number_format($totalSetoranUser) }}</p>
                                </div>
                                <div class="flex items-center justify-center w-10 h-10 bg-orange-500 rounded-2xl">
                                    <i data-feather="package" class="text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5 h-full">
                            <div class="flex items-center">
                                <div class="ml-5 mr-auto">
                                    <h2 class="text-gray-600 dark:text-gray-200 text-sm font-medium">Total Pembelian
                                    </h2>
                                    <p class="text-lg text-gray-800 dark:text-gray-100 font-semibold">
                                        {{ number_format($totalPenarikanUser) }}</p>
                                </div>
                                <div class="flex items-center justify-center w-10 h-10 bg-orange-500 rounded-2xl">
                                    <i data-feather="shopping-cart" class="text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($user->status === 'active')
                <div class="col-span-12 lg:col-span-4">
                    <div @click="sendWhatsAppNotification()"
                        class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-gray-800 dark:to-gray-700
                        shadow-lg rounded-xl p-6 hover:shadow-xl cursor-pointer
                        transition-all duration-200 transform hover:-translate-y-1 h-full flex flex-col
                        border border-green-100 dark:border-green-900/30 overflow-hidden relative">

                        <div
                            class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-gradient-to-br from-green-400/20 to-green-500/30 rounded-full">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 w-24 h-24 -mb-6 -ml-6 bg-gradient-to-br from-green-400/10 to-green-500/20 rounded-full">
                        </div>

                        <div class="mb-4 relative z-10">
                            <div
                                class="inline-flex items-center justify-center p-3 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-md">
                                <i data-feather="message-circle" class="h-6 w-6 text-white"></i>
                            </div>
                            <span
                                class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                WhatsApp
                            </span>
                        </div>

                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2 relative z-10">Hubungi Petugas Pengambilan</h2>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 relative z-10">
                            Beritahu petugas untuk pengambilan sampah pada hari Minggu
                        </p>

                        <div class="flex items-center mb-4 relative z-10">
                            <div
                                class="bg-white dark:bg-gray-700 rounded-lg px-3 py-2 shadow-sm border border-green-100 dark:border-gray-600">
                                <div class="flex items-center">
                                    <i data-feather="calendar" class="h-4 w-4 text-green-600 dark:text-green-400 mr-2"></i>
                                    <span class="text-green-700 dark:text-green-300 font-medium"
                                        x-text="getNearestSunday()"></span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white/70 dark:bg-gray-800/70 rounded-xl p-4 mb-5 backdrop-blur-sm relative z-10 shadow-sm border border-green-50 dark:border-gray-700">
                            <h3 class="font-medium text-gray-800 dark:text-gray-200 text-sm mb-2 flex items-center">
                                <i data-feather="info" class="h-4 w-4 mr-2 text-green-600 dark:text-green-400"></i>
                                Informasi Pengambilan
                            </h3>
                            <ul class="text-sm text-gray-600 dark:text-gray-300 space-y-2.5">
                                <li class="flex items-start">
                                    <i data-feather="clock"
                                        class="h-4 w-4 mr-2 mt-0.5 text-gray-500 dark:text-gray-400"></i>
                                    <span>Pengambilan setiap hari Minggu (08:00 - 16:00 WIB)</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="package"
                                        class="h-4 w-4 mr-2 mt-0.5 text-gray-500 dark:text-gray-400"></i>
                                    <span>Sampah harus dipisahkan sesuai kategori</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white/70 dark:bg-gray-800/70 rounded-xl p-4 mb-4 backdrop-blur-sm relative z-10 shadow-sm border border-green-50 dark:border-gray-700">
                            <h3 class="font-medium text-gray-800 dark:text-gray-200 text-sm mb-2 flex items-center">
                                <i data-feather="map-pin" class="h-4 w-4 mr-2 text-green-600 dark:text-green-400"></i>
                                Alamat Anda
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                {{ Auth::user()->alamat ?: 'Alamat belum diisi. Silahkan update profil Anda.' }}
                            </p>
                        </div>

                        <div class="mt-auto relative z-10">
                            <button
                                class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700
                                text-white font-medium py-3 px-4 rounded-xl transition-colors flex items-center justify-center
                                shadow-md hover:shadow-lg">
                                <i data-feather="phone" class="h-5 w-5 mr-2"></i>
                                Hubungi Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-span-12 lg:col-span-4">
                    <div class="bg-gradient-to-br from-amber-50 to-orange-100 dark:from-gray-800 dark:to-gray-700
                        shadow-lg rounded-xl p-6 h-full flex flex-col
                        border border-amber-200 dark:border-amber-900/30 overflow-hidden relative">

                        <div
                            class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-gradient-to-br from-amber-400/20 to-orange-500/30 rounded-full">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 w-24 h-24 -mb-6 -ml-6 bg-gradient-to-br from-amber-400/10 to-orange-500/20 rounded-full">
                        </div>

                        <div class="mb-4 relative z-10">
                            <div
                                class="inline-flex items-center justify-center p-3 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl shadow-md">
                                <i data-feather="alert-triangle" class="h-6 w-6 text-white"></i>
                            </div>
                            <span
                                class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200">
                                Peringatan
                            </span>
                        </div>

                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2 relative z-10">Akun Tidak Aktif</h2>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 relative z-10">
                            Akun Anda saat ini tidak aktif. Anda perlu membayar iuran untuk mengaktifkan akun.
                        </p>

                        <div
                            class="bg-white/70 dark:bg-gray-800/70 rounded-xl p-4 mb-5 backdrop-blur-sm relative z-10 shadow-sm border border-amber-50 dark:border-gray-700">
                            <h3 class="font-medium text-gray-800 dark:text-gray-200 text-sm mb-2 flex items-center">
                                <i data-feather="info" class="h-4 w-4 mr-2 text-amber-600 dark:text-amber-400"></i>
                                Informasi Iuran
                            </h3>
                            <ul class="text-sm text-gray-600 dark:text-gray-300 space-y-2.5">
                                <li class="flex items-start">
                                    <i data-feather="credit-card"
                                        class="h-4 w-4 mr-2 mt-0.5 text-gray-500 dark:text-gray-400"></i>
                                    <span>Iuran bulanan: Rp 25.000</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="check-circle"
                                        class="h-4 w-4 mr-2 mt-0.5 text-gray-500 dark:text-gray-400"></i>
                                    <span>Akses ke layanan pengambilan sampah</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-auto relative z-10">
                            <a href="{{ route('nasabah.iuran') }}"
                                class="w-full bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700
                                text-white font-medium py-3 px-4 rounded-xl transition-colors flex items-center justify-center
                                shadow-md hover:shadow-lg">
                                <i data-feather="credit-card" class="h-5 w-5 mr-2"></i>
                                Bayar Iuran Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
