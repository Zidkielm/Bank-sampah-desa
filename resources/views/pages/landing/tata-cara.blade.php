<x-landing-layout>
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo-bank-sampah.svg') }}" alt="Logo Bank Sampah"
                        class="h-14 w-14 object-contain" />
                    <span class="text-secondary text-xl font-bold">Bank Sampah Sumber Pawana</span>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 focus:outline-none">
                        <i data-feather="menu" class="h-6 w-6"></i>
                    </button>
                </div>
                <div class="hidden items-center space-x-10 md:flex">
                    <a href="{{ route('landing') }}" class="text-secondary hover:text-primary font-medium">Beranda</a>
                    <a href="{{ route('landing') }}" class="text-secondary hover:text-primary font-medium">Tentang Kami</a>
                    <a href="{{ route('landing') }}" class="text-secondary hover:text-primary font-medium">Jenis Sampah</a>
                    <a href="{{ route('tata-cara') }}" class="text-secondary hover:text-primary font-medium">Tata Cara</a>
                    <a href="{{ route('login') }}" class="text-secondary hover:text-primary font-medium">Masuk
                        Petugas</a>
                    <div class="flex gap-3">
                        <a href="{{ route('register') }}"
                            class="text-primary hover:bg-light-orange rounded-lg px-5 py-2 transition duration-300 hover:text-white">Daftar</a>
                        <a href="{{ route('login') }}"
                            class="bg-primary hover:bg-light0orange rounded-lg px-5 py-2 text-white transition duration-300">Masuk</a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu" class="mt-4 hidden pb-2 md:hidden">
                <a href="#beranda" class="text-secondary hover:text-primary block py-2 font-medium">Beranda</a>
                <a href="#tentang" class="text-secondary hover:text-primary block py-2 font-medium">Tentang Kami</a>
                <a href="#jenis-sampah" class="text-secondary hover:text-primary block py-2 font-medium">Jenis
                    Sampah</a>
                <a href="#tata-cara" class="text-secondary hover:text-primary block py-2 font-medium">Tata Cara</a>
                <a href="masuk-petugas.html" class="text-secondary hover:text-primary block py-2 font-medium">Masuk
                    Petugas</a>
                <a href="#"
                    class="text-primary hover:bg-light-orange mt-2 block w-fit rounded-lg px-4 py-2 transition duration-300 hover:text-white">Daftar</a>
                <a href="#"
                    class="bg-primary hover:bg-light-orange mt-2 block w-fit rounded-lg px-4 py-2 text-white transition duration-300">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-primary py-16">
        <div class="container mx-auto px-8 text-center">
            <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl">Tata Cara Penggunaan Website</h1>
            <p class="mx-auto max-w-2xl text-lg text-white opacity-90">
                Panduan lengkap untuk memaksimalkan pengalaman Anda menggunakan layanan Bank Sampah
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-20">
        <div class="container mx-auto px-8">
            <!-- Back to Home Button (Top) -->
            <div class="mb-10 text-center">
                <a href="{{ route('landing') }}"
                    class="bg-primary hover:bg-light-orange inline-flex items-center rounded-lg px-6 py-3 font-bold text-white transition duration-300">
                    <i data-feather="arrow-left" class="mr-2 h-5 w-5"></i>
                    Kembali ke Beranda
                </a>
            </div>

            <!-- Introduction -->
            <div class="mx-auto mb-16 max-w-3xl text-center">
                <h2 class="text-secondary mb-6 text-3xl font-bold">Kelola Sampah Lebih Mudah Bersama Kami</h2>
                <p class="leading-relaxed text-gray-600">
                    Bank Sampah hadir untuk memudahkan Anda dalam mengelola sampah dengan cara yang menguntungkan.
                    Ikuti panduan ini untuk memulai perjalanan daur ulang Anda bersama kami.
                </p>
            </div>

            <!-- Tabs Navigation -->
            <div class="mx-auto mb-10 max-w-4xl">
                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-2">
                    <div class="border-b border-gray-200 pb-2">
                        <button
                            class="tab-button text-secondary border-primary -mb-px w-full border-b-2 px-6 py-4 font-medium"
                            data-tab="tab1">
                            Cara Mendaftar
                        </button>
                    </div>
                    <div class="border-b border-gray-200 pb-2">
                        <button class="tab-button hover:text-secondary w-full px-6 py-4 font-medium text-gray-500"
                            data-tab="tab2">
                            Cara Mengajukan Pengambilan
                        </button>
                    </div>
                    <div class="border-b border-gray-200 pb-2">
                        <button class="tab-button hover:text-secondary w-full px-6 py-4 font-medium text-gray-500"
                            data-tab="tab3">
                            Cara Membayar Iuran
                        </button>
                    </div>
                    <div class="border-b border-gray-200 pb-2">
                        <button class="tab-button hover:text-secondary w-full px-6 py-4 font-medium text-gray-500"
                            data-tab="tab4">
                            Cara Melakukan Pembelian
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="mx-auto max-w-4xl">
                <!-- Tab 1: Cara Mendaftar -->
                <div id="tab1" class="tab-content">
                    <div class="mb-12 overflow-hidden rounded-lg bg-white shadow-sm">
                        <div class="p-8">
                            <div class="mb-6 flex items-center">
                                <div class="bg-primary mr-4 flex h-12 w-12 items-center justify-center rounded-full">
                                    <i data-feather="user-plus" class="h-5 w-5 shrink-0 text-white"></i>
                                </div>
                                <h3 class="text-secondary text-2xl font-bold">Cara Mendaftar</h3>
                            </div>

                            <p class="mb-8 leading-relaxed text-gray-600">
                                Langkah pertama untuk menggunakan layanan Bank Sampah adalah membuat akun. Proses
                                pendaftaran sangat mudah dan hanya membutuhkan beberapa menit.
                            </p>

                            <div class="mb-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">
                                        Langkah-langkah Pendaftaran:
                                    </h4>
                                    <ol class="space-y-3">
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">1</span>
                                            <span class="text-gray-600">Kunjungi website Bank Sampah</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">2</span>
                                            <span class="text-gray-600">Klik tombol "Daftar" di pojok kanan atas</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">3</span>
                                            <span class="text-gray-600">Isi formulir pendaftaran dengan data yang
                                                valid</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">4</span>
                                            <span class="text-gray-600">Buat kata sandi yang kuat</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">5</span>
                                            <span class="text-gray-600">Klik tombol "Daftar"</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">6</span>
                                            <span class="text-gray-600">Selesai</span>
                                        </li>
                                    </ol>
                                </div>

                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">
                                        Lengkapi Informasi yang Dibutuhkan:
                                    </h4>
                                    <ul class="space-y-3">
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Nama lengkap</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Alamat email aktif</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Nomor telepon</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Alamat lengkap</span>
                                        </li>
                                    </ul>

                                    <div class="mt-6 rounded border-l-4 border-yellow-400 bg-yellow-50 p-4">
                                        <p class="flex items-start text-yellow-800">
                                            <i data-feather="info" class="mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                            <span>Pastikan data yang Anda masukkan benar sesuai dengan ketentuan
                                                untuk memudahkan proses verifikasi.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                        <div class="p-8">
                            <h4 class="text-secondary mb-4 text-lg font-bold">Tampilan Halaman Pendaftaran:</h4>
                            <img src="{{ asset('images/register.webp') }}" alt="Halaman Pendaftaran"
                                class="h-auto w-full rounded-lg shadow-md" />
                            <p class="mt-2 text-sm text-gray-500">
                                Contoh tampilan halaman pendaftaran Bank Sampah
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Cara Mengajukan Pengambilan Sampah -->
                <div id="tab2" class="tab-content hidden">
                    <div class="mb-12 overflow-hidden rounded-lg bg-white shadow-sm">
                        <div class="p-8">
                            <div class="mb-6 flex items-center">
                                <div
                                    class="bg-light-green mr-4 flex h-12 w-12 items-center justify-center rounded-full">
                                    <i data-feather="truck" class="h-5 w-5 text-white"></i>
                                </div>
                                <h3 class="text-secondary text-2xl font-bold">
                                    Cara Mengajukan Pengambilan Sampah
                                </h3>
                            </div>

                            <p class="mb-8 leading-relaxed text-gray-600">
                                Setelah sampah terkumpul, Anda dapat menjadwalkan pengambilan melalui website Bank
                                Sampah. Proses pengambilan dirancang untuk memberikan kenyamanan maksimal bagi Anda.
                            </p>

                            <div class="mb-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">
                                        Langkah-langkah Pengajuan:
                                    </h4>
                                    <ol class="space-y-3">
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">1</span>
                                            <span class="text-gray-600">Login ke akun Bank Sampah Anda</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">2</span>
                                            <span class="text-gray-600">Pilih menu "Ajukan Pengambilan"</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">3</span>
                                            <span class="text-gray-600">Anda akan diarahkan menuju halaman
                                                whatsapp</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">4</span>
                                            <span class="text-gray-600">Klik tombol kirim</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">5</span>
                                            <span class="text-gray-600">Petugas akan mengkonfirmasi pengambilan dan
                                                mengambil
                                                kerumahmu</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">6</span>
                                            <span class="text-gray-600">Tambahkan catatan khusus jika diperlukan</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-green mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">7</span>
                                            <span class="text-gray-600">Petugas akan menimbang dan mencatat setoran
                                                sampah</span>
                                        </li>
                                    </ol>
                                </div>

                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">Informasi Penting:</h4>
                                    <ul class="space-y-3">
                                        <li class="flex items-start">
                                            <i data-feather="clock" class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Ajukan pengambilan minimal 24 jam
                                                sebelumnya</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="calendar"
                                                class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Pengambilan akan dilakukan setiap hari
                                                Minggu</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="clock" class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Jam operasional: 08.00 - 16.00 WIB</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="package"
                                                class="text-light-green mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Minimal berat sampah untuk pengambilan: 1
                                                kg</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="bell"
                                                class="text-light-green mr-3 mt-0.5 h-5 w-5 shrink-0"></i>
                                            <span class="text-gray-600">Anda dapat melihat riwayat pengambilan pada
                                                menu "Riwayat"</span>
                                        </li>
                                    </ul>

                                    <div class="mt-6 rounded border-l-4 border-blue-400 bg-blue-50 p-4">
                                        <p class="flex items-start text-blue-800">
                                            <i data-feather="bell" class="mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                            <span>Anda akan menerima saldo tabungan sebesar berat setoran sampah
                                                anda.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                        <div class="p-8">
                            <h4 class="text-secondary mb-4 text-lg font-bold">Proses Pengambilan:</h4>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                                <div class="rounded-lg bg-gray-50 p-5">
                                    <div class="mb-3 flex items-center">
                                        <div
                                            class="bg-primary mr-3 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                            1
                                        </div>
                                        <h5 class="text-secondary font-semibold">Kedatangan Petugas</h5>
                                    </div>
                                    <p class="text-gray-600">Petugas akan datang sesuai jadwal yang ditentukan.</p>
                                </div>

                                <div class="rounded-lg bg-gray-50 p-5">
                                    <div class="mb-3 flex items-center">
                                        <div
                                            class="bg-primary mr-3 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                            2
                                        </div>
                                        <h5 class="text-secondary font-semibold">Penimbangan</h5>
                                    </div>
                                    <p class="text-gray-600">
                                        Petugas akan menimbang sampah berdasarkan kategori dan mencatat hasilnya di
                                        sistem.
                                    </p>
                                </div>

                                <div class="rounded-lg bg-gray-50 p-5">
                                    <div class="mb-3 flex items-center">
                                        <div
                                            class="bg-primary mr-3 flex h-8 w-8 items-center justify-center rounded-full text-sm font-bold text-white">
                                            3
                                        </div>
                                        <h5 class="text-secondary font-semibold">Konfirmasi</h5>
                                    </div>
                                    <p class="text-gray-600">
                                        Anda akan menerima bukti pengambilan dan saldo akan otomatis ditambahkan ke
                                        akun Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Cara Membayar Iuran Bulanan -->
                <div id="tab3" class="tab-content hidden">
                    <div class="mb-12 overflow-hidden rounded-lg bg-white shadow-sm">
                        <div class="p-8">
                            <div class="mb-6 flex items-center">
                                <div class="bg-secondary mr-4 flex h-12 w-12 items-center justify-center rounded-full">
                                    <i data-feather="credit-card" class="h-5 w-5 text-white"></i>
                                </div>
                                <h3 class="text-secondary text-2xl font-bold">Cara Membayar Iuran Bulanan</h3>
                            </div>

                            <p class="mb-8 leading-relaxed text-gray-600">
                                Sebagai anggota Bank Sampah, Anda perlu membayar iuran bulanan untuk mendukung
                                operasional pengambilan sampah rutin 3X Seminggu. Kami menyediakan metode pembayaran
                                Transfer dan Tunai.
                            </p>

                            <div class="mb-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">
                                        Langkah-langkah Pembayaran:
                                    </h4>
                                    <ol class="space-y-3">
                                        <li class="flex">
                                            <span
                                                class="bg-secondary mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">1</span>
                                            <span class="text-gray-600">Login ke akun Bank Sampah Anda</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-secondary mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">2</span>
                                            <span class="text-gray-600">Pilih menu "Iuran"</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-secondary mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">3</span>
                                            <span class="text-gray-600">Masukkan nominal iuran sebesar Rp 25.000</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-secondary mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">4</span>
                                            <span class="text-gray-600">Pilih metode pembayaran yang diinginkan</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-secondary mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">5</span>
                                            <span class="text-gray-600">Ikuti Tata Cara pembayaran sesuai yang
                                                tertulis</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-secondary mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">6</span>
                                            <span class="text-gray-600">Upload bukti pembayaran</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-secondary mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">7</span>
                                            <span class="text-gray-600">Admin akan mengkonfirmasi bukti
                                                pembayaran</span>
                                        </li>
                                    </ol>
                                </div>

                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">Metode Pembayaran:</h4>
                                    <ul class="space-y-3">
                                        <li class="flex items-start">
                                            <i data-feather="smartphone"
                                                class="text-secondary mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">E-wallet (OVO, DANA, LinkAja)</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="home" class="text-secondary mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Internet/Mobile Banking</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="user" class="text-secondary mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Tunai</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="dollar-sign"
                                                class="text-secondary mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Virtual Account</span>
                                        </li>
                                    </ul>

                                    <div class="mt-6 rounded border-l-4 border-green-400 bg-green-50 p-4">
                                        <p class="flex items-start text-green-800">
                                            <i data-feather="alert-circle" class="mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                            <span>Pembayaran iuran dilakukan paling lambat tgl. 10 setiap
                                                bulannya.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 4: Cara Melakukan Pembelian Barang -->
                <div id="tab4" class="tab-content hidden">
                    <div class="mb-12 overflow-hidden rounded-lg bg-white shadow-sm">
                        <div class="p-8">
                            <div class="mb-6 flex items-center">
                                <div
                                    class="bg-light-orange mr-4 flex h-12 w-12 items-center justify-center rounded-full">
                                    <i data-feather="shopping-bag" class="h-5 w-5 text-white"></i>
                                </div>
                                <h3 class="text-secondary text-2xl font-bold">Cara Melakukan Pembelian Barang</h3>
                            </div>

                            <p class="mb-8 leading-relaxed text-gray-600">
                                Saldo tabungan yang Anda kumpulkan dari penyetoran sampah dapat digunakan untuk
                                membeli berbagai produk ramah lingkungan dan kebutuhan sehari-hari di toko BUM Desa
                                DADI JAYA Sumberdadi.
                            </p>

                            <div class="mb-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">
                                        Langkah-langkah Pembelian:
                                    </h4>
                                    <ol class="space-y-3">
                                        <li class="flex">
                                            <span
                                                class="bg-light-orange mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">1</span>
                                            <span class="text-gray-600">Datang langsung ke toko BUM Desa DADI JAYA
                                                Sumberdadi</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-orange mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">2</span>
                                            <span class="text-gray-600">Pilih barang apa yang Anda inginkan"</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-orange mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">3</span>
                                            <span class="text-gray-600">Serahkan kepada admin</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-orange mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">4</span>
                                            <span class="text-gray-600">Admin akan menghitung total barang belanjaan
                                                Anda</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-orange mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">5</span>
                                            <span class="text-gray-600">Total barang belanja akan terpotong oleh saldo
                                                tabungan Anda</span>
                                        </li>
                                        <li class="flex">
                                            <span
                                                class="bg-light-orange mr-3 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full text-white">6</span>
                                            <span class="text-gray-600">Selesai</span>
                                        </li>
                                    </ol>
                                </div>

                                <div>
                                    <h4 class="text-secondary mb-4 text-lg font-bold">Kategori Produk:</h4>
                                    <ul class="space-y-3">
                                        <li class="flex items-start">
                                            <i data-feather="package"
                                                class="text-light-orange mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Produk daur ulang (tas, dompet, keset
                                                perca)</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="home" class="text-light-orange mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Peralatan rumah tangga (sapu, cobe, pisau,
                                                talenan)</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="coffee"
                                                class="text-light-orange mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600">Makanan dan minuman</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="shopping-bag"
                                                class="text-light-orange mr-3 mt-0.5 h-5 w-5"></i>
                                            <span class="text-gray-600"> Barang kebutuhan sehari-hari</span>
                                        </li>
                                    </ul>

                                    <div class="mt-6 rounded border-l-4 border-orange-400 bg-orange-50 p-4">
                                        <p class="flex items-start text-orange-800">
                                            <i data-feather="alert-circle" class="mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                            <span>Anda tetap dapat melakukan pembayaran secara tunai jika saldo
                                                tabungan Anda kurang.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Home Button (Bottom) -->
            <div class="mt-16 text-center">
                <a href="{{ route('landing') }}"
                    class="bg-primary hover:bg-light-orange inline-flex items-center rounded-lg px-6 py-3 font-bold text-white transition duration-300">
                    <i data-feather="arrow-left" class="mr-2 h-5 w-5"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-700 py-12 text-white">
        <div class="container mx-auto px-8">
            <div class="flex flex-col justify-between gap-10 md:flex-row">
                <!-- Brand & Description -->
                <div class="md:w-1/3">
                    <div class="mb-6 flex items-center">
                        <img src="{{ asset('images/logo-bank-sampah.svg') }}" alt="Logo Bank Sampah"
                            class="mr-3 h-20 w-20" />
                        <span class="text-xl font-bold leading-tight"> Bank Sampah <br />Sumber Pawana </span>
                    </div>
                    <p class="leading-relaxed text-gray-300">
                        Solusi pengelolaan sampah terpadu untuk lingkungan yang lebih bersih dan berkelanjutan.
                    </p>
                </div>

                <!-- Footer Links -->
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:w-2/3 md:grid-cols-3">
                    <!-- Layanan -->
                    <div>
                        <h3 class="mb-4 text-lg font-bold">Layanan</h3>
                        <ul class="space-y-3 text-gray-300">
                            <li><a href="#" class="hover:text-primary">Pengambilan Sampah</a></li>
                            <li><a href="#" class="hover:text-primary">Penukaran Saldo Tabungan</a></li>
                            <li><a href="#" class="hover:text-primary">Iuran Bulanan</a></li>
                            <li>
                                <a href="#" class="hover:text-primary">Pengambilan Rutin Sampah Rumah Tangga</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Perusahaan -->
                    <div>
                        <h3 class="mb-4 text-lg font-bold">Perusahaan</h3>
                        <ul class="space-y-3 text-gray-300">
                            <li><a href="#tentang" class="hover:text-primary">Tentang Kami</a></li>
                            <li><a href="#jenis-sampah" class="hover:text-primary">Jenis Sampah</a></li>
                            <li><a href="#tata-cara" class="hover:text-primary">Tata Cara</a></li>
                            <li><a href="#masuk-petugas" class="hover:text-primary">Masuk Petugas</a></li>
                        </ul>
                    </div>

                    <!-- Kontak -->
                    <div>
                        <h3 class="mb-4 text-lg font-bold">Kontak</h3>
                        <ul class="space-y-3 text-gray-300">
                            <li class="flex items-start">
                                <i data-feather="map-pin" class="text-primary mr-3 mt-1 h-5 w-5 shrink-0"></i>
                                <span>
                                    Jl. Raya Sumbergempol No.1, Gempol, Sumberdadi, Kec. Sumbergempol,<br />
                                    Kabupaten Tulungagung, Jawa Timur 66291
                                </span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="phone" class="text-primary mr-3 mt-1 h-5 w-5"></i>
                                <span>+62 896 616 337 33</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="mail" class="text-primary mr-3 mt-1 h-5 w-5"></i>
                                <span>info@banksampah.id</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-10 border-t border-gray-600 pt-6 text-center text-sm text-gray-400">
                &copy; 2025 Bank Sampah Sumber Pawana. Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <script>
        // Initialize Feather icons
        feather.replace()

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button')
        const mobileMenu = document.getElementById('mobile-menu')

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden')
        })

        // Tab Functionality
        const tabButtons = document.querySelectorAll('.tab-button')
        const tabContents = document.querySelectorAll('.tab-content')

        tabButtons.forEach((button) => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                tabButtons.forEach((btn) => {
                    btn.classList.remove('border-primary', 'text-secondary')
                    btn.classList.add('text-gray-500')
                    btn.parentElement.classList.remove('-mb-px')
                })

                // Add active class to clicked button
                button.classList.add('border-b-2', 'border-primary', 'text-secondary')
                button.classList.remove('text-gray-500')
                button.parentElement.classList.add('-mb-px')

                // Hide all tab contents
                tabContents.forEach((content) => {
                    content.classList.add('hidden')
                })

                // Show the corresponding tab content
                const tabId = button.getAttribute('data-tab')
                document.getElementById(tabId).classList.remove('hidden')
            })
        })

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault()

                const targetId = this.getAttribute('href')
                if (targetId === '#') return

                const targetElement = document.querySelector(targetId)
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Adjust for navbar height
                        behavior: 'smooth',
                    })

                    // Close mobile menu if open
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden')
                    }
                }
            })
        })
    </script>

</x-landing-layout>
