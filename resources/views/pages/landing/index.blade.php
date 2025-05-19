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
                    <a href="#beranda" class="text-secondary hover:text-primary font-medium">Beranda</a>
                    <a href="#tentang" class="text-secondary hover:text-primary font-medium">Tentang Kami</a>
                    <a href="#jenis-sampah" class="text-secondary hover:text-primary font-medium">Jenis Sampah</a>
                    <a href="#tata-cara" class="text-secondary hover:text-primary font-medium">Tata Cara</a>
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

    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('images/foto-kegiatan-1.webp') }}')">
        <!-- Overlay gelap -->
        <div class="absolute inset-0 bg-black opacity-40"></div>

        <!-- Konten -->
        <div class="container relative mx-auto flex h-full items-center px-8">
            <div class="text-white md:w-1/2">
                <h1 class="mb-6 text-4xl font-bold leading-tight md:text-5xl">
                    Ubah Sampah Menjadi Nilai Ekonomis
                </h1>
                <p class="mb-10 text-lg opacity-90">
                    Bank Sampah membantu Anda mengelola sampah dengan bijak dan mendapatkan keuntungan dari sampah
                    yang Anda kumpulkan.
                </p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:space-x-4 sm:space-y-0">
                    <a href="#"
                        class="text-primary rounded-lg bg-white px-8 py-3 text-center font-bold transition duration-300 hover:bg-gray-200">
                        Daftar Sekarang
                    </a>
                    <a href="#tata-cara"
                        class="bg-secondary hover:bg-dark-green rounded-lg px-8 py-3 text-center font-bold text-white transition duration-300">
                        Cara Kerja
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-button class="fixed bottom-4 right-4 rounded-full bg-orange-500 p-3 text-white shadow-lg hover:bg-orange-600">
        <i data-feather="phone" class="text-white"></i>
    </x-button>

    <!-- Tentang kami -->
    <section id="tentang" class="bg-white py-20">
        <div class="container mx-auto px-8">
            <div class="mb-16 text-center">
                <h2 class="text-secondary mb-4 text-3xl font-bold md:text-4xl">Tentang Kami</h2>
                <div class="bg-primary mx-auto h-1 w-16"></div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="mb-10 md:mb-0 md:w-1/2">
                    <img src="{{ asset('images/unit-bank-sampah.webp') }}" alt="Tim Bank Sampah"
                        class="h-auto w-full rounded-lg shadow-lg" />
                </div>
                <div class="md:w-1/2 md:pl-16">
                    <p class="mb-6 leading-relaxed text-gray-700">
                        Bank Sampah Desa Sumberdadi hadir sebagai solusi inovatif untuk mengatasi permasalahan
                        sampah sekaligus meningkatkan kesejahteraan masyarakat. Kami mengajak warga untuk memilah
                        dan menabung sampah anorganik yang nantinya dapat ditukar menjadi nilai ekonomi. Dengan
                        dukungan teknologi berbasis website, proses pencatatan, dan transaksi menjadi lebih
                        transparan dan mudah diakses. Melalui kolaborasi antara warga, petugas, dan pemerintah desa,
                        Bank Sampah menjadi gerakan bersama menuju lingkungan yang sehat dan ekonomi yang lebih
                        inklusif.
                    </p>
                    <h2 class="text-secondary mb-6 text-2xl font-bold">Layanan yang Kami Sediakan</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-light-green mr-4 flex items-center justify-center rounded-full p-2">
                                <i data-feather="bell" class="h-5 w-5 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-secondary mb-1 font-bold">Pengambilan Sampah</h4>
                                <p class="text-gray-600">
                                    Melakukan pengambilan sampah yang masih memiliki nilai guna melalui sistem
                                    request dari nasabah.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-light-green mr-4 flex items-center justify-center rounded-full p-2">
                                <i data-feather="dollar-sign" class="h-5 w-5 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-secondary mb-1 font-bold">Pembayaran Iuran</h4>
                                <p class="text-gray-600">
                                    Dengan sistem pembayaran iuran nasabah hanya perlu melakukan transfer dan data
                                    akan tersimpan dengan aman.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-light-green mr-4 flex items-center justify-center rounded-full p-2">
                                <i data-feather="shopping-bag" class="h-5 w-5 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-secondary mb-1 font-bold">Pembelian barang</h4>
                                <p class="text-gray-600">
                                    Nasabah bisa mendapatkan voucher belanja di BUM Desa Sumberdadi menggunakan
                                    saldo tabungan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jenis sampah -->
    <section id="jenis-sampah" class="bg-gray-50 py-20">
        <div class="container mx-auto px-8">
            <div class="mb-16 text-center">
                <h2 class="text-secondary mb-4 text-3xl font-bold md:text-4xl">Jenis Sampah yang Bisa Diangkut</h2>
                <div class="bg-primary mx-auto mb-6 h-1 w-16"></div>
                <p class="mx-auto max-w-2xl text-gray-600">
                    Kami menerima berbagai jenis sampah yang dapat didaur ulang dan dimanfaatkan kembali.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 text-center sm:grid-cols-2 lg:grid-cols-3">
                <!-- Sampah Plastik -->
                <div
                    class="overflow-hidden rounded-lg bg-white shadow-md transition-transform duration-300 hover:scale-105 hover:transform">
                    <div class="bg-light-green h-48 overflow-hidden">
                        <img src="{{ asset('images/sampah-botol-plastik.webp') }}" alt="Sampah Plastik"
                            class="h-full w-full object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-secondary mb-3 text-xl font-bold">Sampah Plastik</h3>
                        <p class="text-gray-600">
                            Botol plastik, kemasan makanan, kantong plastik, gelas plastik, dan produk plastik
                            lainnya yang bersih.
                        </p>
                    </div>
                </div>

                <!-- Sampah Kertas -->
                <div
                    class="overflow-hidden rounded-lg bg-white shadow-md transition-transform duration-300 hover:scale-105 hover:transform">
                    <div class="bg-light-green h-48 overflow-hidden">
                        <img src="{{ asset('images/sampah-kertas.webp') }}" alt="Sampah Kertas"
                            class="h-full w-full object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-secondary mb-3 text-xl font-bold">Sampah Kertas</h3>
                        <p class="text-gray-600">
                            Koran bekas, majalah, kardus, kertas HVS, buku, dan berbagai jenis kertas yang tidak
                            terkontaminasi.
                        </p>
                    </div>
                </div>

                <!-- Sampah Kardus -->
                <div
                    class="overflow-hidden rounded-lg bg-white shadow-md transition-transform duration-300 hover:scale-105 hover:transform">
                    <div class="bg-light-green h-48 overflow-hidden">
                        <img src="{{ asset('images/sampah-kardus.webp') }}" alt="Sampah Kardus"
                            class="h-full w-full object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-secondary mb-3 text-xl font-bold">Sampah Kardus</h3>
                        <p class="text-gray-600">
                            Kardus bekas makanan, kardus pengiriman, kotak kemasan elektronik, dan berbagai jenis
                            kardus lainnya yang bersih dan kering.
                        </p>
                    </div>
                </div>

                <!-- Sampah Elektronik -->
                <div
                    class="overflow-hidden rounded-lg bg-white shadow-md transition-transform duration-300 hover:scale-105 hover:transform">
                    <div class="bg-light-green h-48 overflow-hidden">
                        <img src="{{ asset('images/sampah-elektronik.webp') }}" alt="Sampah Elektronik"
                            class="h-full w-full object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-secondary mb-3 text-xl font-bold">Sampah Elektronik</h3>
                        <p class="text-gray-600">
                            Barang elektronik bekas seperti handphone, laptop, TV, dan perangkat elektronik lainnya.
                        </p>
                    </div>
                </div>

                <!-- Sampah Kaleng -->
                <div
                    class="overflow-hidden rounded-lg bg-white shadow-md transition-transform duration-300 hover:scale-105 hover:transform">
                    <div class="bg-light-green h-48 overflow-hidden">
                        <img src="{{ asset('images/sampah-kaleng.webp') }}" alt="Sampah Kaleng"
                            class="h-full w-full object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-secondary mb-3 text-xl font-bold">Sampah Kaleng</h3>
                        <p class="text-gray-600">
                            Kaleng minuman, kaleng makanan, wadah berbahan logam, serta berbagai jenis kaleng lain
                            yang bersih dan tidak berkarat.
                        </p>
                    </div>
                </div>

                <!-- Sampah Yang Tidak Diangkut -->
                <div
                    class="overflow-hidden rounded-lg border-l-4 border-red-500 bg-red-50 shadow-md transition-transform duration-300 hover:scale-105 hover:transform">
                    <div class="p-6 text-start">
                        <h3 class="mb-3 text-xl font-bold text-red-600">Sampah Yang Tidak Bisa Diangkut</h3>
                        <ul class="flex flex-col space-y-2">
                            <li class="flex items-start">
                                <i data-feather="x" class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-red-500"></i>
                                <span class="text-gray-600">Sampah kayu seperti serbuk gergaji, sisa-sisa produksi
                                    mebel, dan potongan kayu
                                    lainnya.</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="x" class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-red-500"></i>
                                <span class="text-gray-600">Sampah pecahan kaca seperti pecahan botol minuman, gelas
                                    kaca, kaca jendela,
                                    dan lainnya.
                                </span>
                            </li>

                            <li class="flex items-start">
                                <i data-feather="x" class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-red-500"></i>
                                <span class="text-gray-600">Sampah konstruksi seperti puing bangunan, asbes, dan
                                    material berbahaya
                                    lainnya.</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="x" class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-red-500"></i>
                                <span class="text-gray-600">Sampah medis seperti jarum suntik, obat-obatan, dan perban
                                    bekas.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tata cara penggunaan --}}
    <section id="tata-cara" class="bg-white py-20">
        <div class="container mx-auto px-8">
            <div class="mb-16 text-center">
                <h2 class="text-secondary mb-4 text-3xl font-bold md:text-4xl">Tata Cara Penggunaan Website</h2>
                <div class="bg-primary mx-auto mb-6 h-1 w-16"></div>
                <p class="mx-auto max-w-2xl text-gray-600">
                    Ikuti langkah-langkah sederhana berikut untuk mulai menggunakan layanan Bank Sampah:
                </p>
            </div>

            <!-- Carousel -->
            <div class="relative mx-auto max-w-5xl overflow-hidden">
                <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
                    <!-- Item 1: Cara Mendaftar -->
                    <div class="carousel-item min-w-full px-4">
                        <div class="flex flex-col items-center rounded-lg bg-gray-50 p-8 shadow-sm md:flex-row">
                            <div class="mb-6 flex justify-center md:mb-0 md:w-1/3">
                                <div class="bg-primary flex h-20 w-20 items-center justify-center rounded-full">
                                    <i data-feather="user-plus" class="h-8 w-8 text-white"></i>
                                </div>
                            </div>
                            <div class="md:w-2/3 md:pl-8">
                                <h3 class="text-secondary mb-4 text-2xl font-bold">Cara Mendaftar</h3>
                                <p class="mb-4 leading-relaxed text-gray-600">
                                    Buat akun di website Bank Sampah dengan mengisi data diri Anda. Proses
                                    pendaftaran sangat mudah dan cepat.
                                </p>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <i data-feather="check" class="text-light-green mr-2 mt-0.5 h-5 w-5"></i>
                                        <span>Kunjungi website dan klik tombol "Daftar"</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check" class="text-light-green mr-2 mt-0.5 h-5 w-5"></i>
                                        <span>Isi formulir dengan data diri yang valid</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check" class="text-light-green mr-2 mt-0.5 h-5 w-5"></i>
                                        <span>Buat kata sandi yang kuat</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2: Cara Mengajukan Pengambilan Sampah -->
                    <div class="carousel-item min-w-full px-4">
                        <div class="flex flex-col items-center rounded-lg bg-gray-50 p-8 shadow-sm md:flex-row">
                            <div class="mb-6 flex justify-center md:mb-0 md:w-1/3">
                                <div class="bg-light-green flex h-20 w-20 items-center justify-center rounded-full">
                                    <i data-feather="truck" class="h-8 w-8 text-white"></i>
                                </div>
                            </div>
                            <div class="md:w-2/3 md:pl-8">
                                <h3 class="text-secondary mb-4 text-2xl font-bold">
                                    Cara Mengajukan Pengambilan Sampah
                                </h3>
                                <p class="mb-4 leading-relaxed text-gray-600">
                                    Ajukan pengambilan sampah sesuai dengan waktu yang Anda inginkan melalui
                                    website.
                                </p>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <i data-feather="check" class="text-light-green mr-2 mt-0.5 h-5 w-5"></i>
                                        <span>Login ke akun Bank Sampah Anda</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check" class="text-light-green mr-2 mt-0.5 h-5 w-5"></i>
                                        <span>Pilih menu "Ajukan Pengambilan"</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check"
                                            class="text-light-green mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                        <span>Anda akan diarahkan menuju halaman whatsapp</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3: Cara Membayar Iuran Bulanan -->
                    <div class="carousel-item min-w-full px-4">
                        <div class="flex flex-col items-center rounded-lg bg-gray-50 p-8 shadow-sm md:flex-row">
                            <div class="mb-6 flex justify-center md:mb-0 md:w-1/3">
                                <div class="bg-secondary flex h-20 w-20 items-center justify-center rounded-full">
                                    <i data-feather="credit-card" class="h-8 w-8 text-white"></i>
                                </div>
                            </div>
                            <div class="md:w-2/3 md:pl-8">
                                <h3 class="text-secondary mb-4 text-2xl font-bold">Cara Membayar Iuran Bulanan</h3>
                                <p class="mb-4 leading-relaxed text-gray-600">
                                    Bayar iuran bulanan dengan mudah melalui berbagai metode pembayaran yang
                                    tersedia.
                                </p>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <i data-feather="check" class="text-light-green mr-2 mt-0.5 h-5 w-5"></i>
                                        <span>Login ke akun Bank Sampah Anda</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check" class="text-light-green mr-2 mt-0.5 h-5 w-5"></i>
                                        <span>Pilih menu "Iuran"</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check"
                                            class="text-light-green mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                        <span>Masukkan nominal iuran sebesar Rp 25.000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4: Cara Melakukan Pembelian Barang -->
                    <div class="carousel-item min-w-full px-4">
                        <div class="flex flex-col items-center rounded-lg bg-gray-50 p-8 shadow-sm md:flex-row">
                            <div class="mb-6 flex justify-center md:mb-0 md:w-1/3">
                                <div class="bg-light-orange flex h-20 w-20 items-center justify-center rounded-full">
                                    <i data-feather="shopping-bag" class="h-8 w-8 text-white shrink-0"></i>
                                </div>
                            </div>
                            <div class="md:w-2/3 md:pl-8">
                                <h3 class="text-secondary mb-4 text-2xl font-bold">
                                    Cara Melakukan Pembelian Barang
                                </h3>
                                <p class="mb-4 leading-relaxed text-gray-600">
                                    Gunakan saldo tabungan Anda untuk membeli berbagai produk ramah lingkungan.
                                </p>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <i data-feather="check"
                                            class="text-light-green mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                        <span>Datang ke toko BUM Desa DADI JAYA Sumberdadi</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check"
                                            class="text-light-green mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                        <span>Pilih barang apa yang Anda inginkan</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i data-feather="check"
                                            class="text-light-green mr-2 mt-0.5 h-5 w-5 shrink-0"></i>
                                        <span>Bayar barang belanjaan Anda dengan saldo tabungan Anda</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button id="prevBtn"
                    class="text-primary hover:text-light-orange absolute left-2 top-1/2 -translate-y-1/2 transform rounded-full bg-white p-2 shadow-md focus:outline-none">
                    <i data-feather="chevron-left" class="h-5 w-5"></i>
                </button>
                <button id="nextBtn"
                    class="text-primary hover:text-light-orange absolute right-2 top-1/2 -translate-y-1/2 transform rounded-full bg-white p-2 shadow-md focus:outline-none">
                    <i data-feather="chevron-right" class="h-5 w-5"></i>
                </button>

                <!-- Carousel Indicators -->
                <div class="mt-8 flex justify-center space-x-2">
                    <button class="carousel-indicator bg-primary h-3 w-3 rounded-full opacity-100"
                        data-index="0"></button>
                    <button class="carousel-indicator h-3 w-3 rounded-full bg-gray-300" data-index="1"></button>
                    <button class="carousel-indicator h-3 w-3 rounded-full bg-gray-300" data-index="2"></button>
                    <button class="carousel-indicator h-3 w-3 rounded-full bg-gray-300" data-index="3"></button>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('tata-cara') }}"
                    class="bg-primary hover:bg-light-orange inline-block rounded-lg px-8 py-3 font-bold text-white transition duration-300">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

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
</x-landing-layout>
