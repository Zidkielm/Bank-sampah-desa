<x-landing-layout>
    <!-- Navbar -->
        <nav class="bg-white shadow-sm sticky top-0 z-50">
            <div class="container mx-auto px-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <img
                            src="/public/assets/logo/logo-bank-sampah.svg"
                            alt="Logo Bank Sampah"
                            class="h-14 w-14 object-contain" />
                        <span class="font-bold text-xl text-secondary">Bank Sampah Sumber Pawana</span>
                    </div>
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-gray-600 focus:outline-none">
                            <i data-feather="menu" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="hidden md:flex space-x-10 items-center">
                        <a href="#beranda" class="text-secondary hover:text-primary font-medium">Beranda</a>
                        <a href="#tentang" class="text-secondary hover:text-primary font-medium">Tentang Kami</a>
                        <a href="#jenis-sampah" class="text-secondary hover:text-primary font-medium">Jenis Sampah</a>
                        <a href="#tata-cara" class="text-secondary hover:text-primary font-medium">Tata Cara</a>
                        <a href="masuk-petugas.html" class="text-secondary hover:text-primary font-medium"
                            >Masuk Petugas</a
                        >
                        <div class="flex gap-3">
                            <a
                                href="#"
                                class="text-primary hover:text-white px-5 py-2 rounded-lg hover:bg-lightOrange transition duration-300"
                                >Daftar</a
                            >
                            <a
                                href="#"
                                class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-lightOrange transition duration-300"
                                >Masuk</a
                            >
                        </div>
                    </div>
                </div>
                <div id="mobile-menu" class="md:hidden hidden mt-4 pb-2">
                    <a href="#beranda" class="block py-2 text-secondary hover:text-primary font-medium">Beranda</a>
                    <a href="#tentang" class="block py-2 text-secondary hover:text-primary font-medium">Tentang Kami</a>
                    <a href="#jenis-sampah" class="block py-2 text-secondary hover:text-primary font-medium"
                        >Jenis Sampah</a
                    >
                    <a href="#tata-cara" class="block py-2 text-secondary hover:text-primary font-medium">Tata Cara</a>
                    <a href="masuk-petugas.html" class="block py-2 text-secondary hover:text-primary font-medium"
                        >Masuk Petugas</a
                    >
                    <a
                        href="#"
                        class="block py-2 text-primary hover:text-white px-4 rounded-lg hover:bg-lightOrange transition duration-300 w-fit mt-2"
                        >Daftar</a
                    >
                    <a
                        href="#"
                        class="block py-2 bg-primary text-white px-4 rounded-lg hover:bg-lightOrange transition duration-300 w-fit mt-2"
                        >Masuk</a
                    >
                </div>
            </div>
        </nav>

    <!-- Hero Section -->
    <section
            id="beranda"
            class="relative bg-cover bg-center h-screen"
            style="background-image: url('/public/assets/img/foto-kegiatan-1.jpg')">
            <!-- Overlay gelap -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Konten -->
            <div class="relative container mx-auto px-8 h-full flex items-center">
                <div class="text-white md:w-1/2">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                        Ubah Sampah Menjadi Nilai Ekonomis
                    </h1>
                    <p class="text-lg mb-10 opacity-90">
                        Bank Sampah membantu Anda mengelola sampah dengan bijak dan mendapatkan keuntungan dari sampah
                        yang Anda kumpulkan.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a
                            href="#"
                            class="bg-white text-primary font-bold px-8 py-3 rounded-lg hover:bg-gray-100 transition duration-300 text-center">
                            Daftar Sekarang
                        </a>
                        <a
                            href="#tata-cara"
                            class="bg-secondary text-white font-bold px-8 py-3 rounded-lg hover:bg-darkGreen transition duration-300 text-center">
                            Cara Kerja
                        </a>
                    </div>
                </div>
            </div>
        </section>

    <x-button class="fixed bottom-4 right-4 bg-orange-500 hover:bg-orange-600 text-white rounded-full p-3 shadow-lg">
        <i data-feather="phone" class="text-white"></i>
    </x-button>

    <!-- About Section -->
    <section id="tentang" class="py-20 bg-white">
            <div class="container mx-auto px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Tentang Kami</h2>
                    <div class="w-16 h-1 bg-primary mx-auto"></div>
                </div>

                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <img
                            src="/public/assets/img/unit-bank-sampah.jpg"
                            alt="Tim Bank Sampah"
                            class="rounded-lg shadow-lg w-full h-auto" />
                    </div>
                    <div class="md:w-1/2 md:pl-16">
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Bank Sampah Desa Sumberdadi hadir sebagai solusi inovatif untuk mengatasi permasalahan
                            sampah sekaligus meningkatkan kesejahteraan masyarakat. Kami mengajak warga untuk memilah
                            dan menabung sampah anorganik yang nantinya dapat ditukar menjadi nilai ekonomi. Dengan
                            dukungan teknologi berbasis website, proses pencatatan, dan transaksi menjadi lebih
                            transparan dan mudah diakses. Melalui kolaborasi antara warga, petugas, dan pemerintah desa,
                            Bank Sampah menjadi gerakan bersama menuju lingkungan yang sehat dan ekonomi yang lebih
                            inklusif.
                        </p>
                        <h2 class="text-2xl font-bold text-secondary mb-6">Layanan yang Kami Sediakan</h2>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-lightGreen p-2 rounded-full mr-4 flex items-center justify-center">
                                    <i data-feather="bell" class="text-white w-5 h-5"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-secondary mb-1">Pengambilan Sampah</h4>
                                    <p class="text-gray-600">
                                        Melakukan pengambilan sampah yang masih memiliki nilai guna melalui sistem
                                        request dari nasabah.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-lightGreen p-2 rounded-full mr-4 flex items-center justify-center">
                                    <i data-feather="dollar-sign" class="text-white w-5 h-5"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-secondary mb-1">Pembayaran Iuran</h4>
                                    <p class="text-gray-600">
                                        Dengan sistem pembayaran iuran nasabah hanya perlu melakukan transfer dan data
                                        akan tersimpan dengan aman.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-lightGreen p-2 rounded-full mr-4 flex items-center justify-center">
                                    <i data-feather="shopping-bag" class="text-white w-5 h-5"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-secondary mb-1">Pembelian barang</h4>
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

    <!-- Waste Categories Section -->
    <section id="jenis-sampah" class="py-20 bg-gray-50">
            <div class="container mx-auto px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Jenis Sampah yang Bisa Diangkut</h2>
                    <div class="w-16 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Kami menerima berbagai jenis sampah yang dapat didaur ulang dan dimanfaatkan kembali.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                    <!-- Sampah Plastik -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="h-48 bg-lightGreen overflow-hidden">
                            <img
                                src="/public/assets/img/sampah-botol-plastik.jpg"
                                alt="Sampah Kertas"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-3">Sampah Plastik</h3>
                            <p class="text-gray-600">
                                Botol plastik, kemasan makanan, kantong plastik, gelas plastik, dan produk plastik
                                lainnya yang bersih.
                            </p>
                        </div>
                    </div>

                    <!-- Sampah Kertas -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="h-48 bg-lightGreen overflow-hidden">
                            <img
                                src="/public/assets/img/sampah-kertas.jpg"
                                alt="Sampah Kertas"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-3">Sampah Kertas</h3>
                            <p class="text-gray-600">
                                Koran bekas, majalah, kardus, kertas HVS, buku, dan berbagai jenis kertas yang tidak
                                terkontaminasi.
                            </p>
                        </div>
                    </div>

                    <!-- Sampah Kardus -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="h-48 bg-lightGreen overflow-hidden">
                            <img
                                src="/public/assets/img/sampah-kardus.jpg"
                                alt="Sampah Kertas"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-3">Sampah Kardus</h3>
                            <p class="text-gray-600">
                                Kardus bekas makanan, kardus pengiriman, kotak kemasan elektronik, dan berbagai jenis
                                kardus lainnya yang bersih dan kering.
                            </p>
                        </div>
                    </div>

                    <!-- Sampah Elektronik -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="h-48 bg-lightGreen overflow-hidden">
                            <img
                                src="/public/assets/img/sampah-elektronik.jpg"
                                alt="Sampah Kertas"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-3">Sampah Elektronik</h3>
                            <p class="text-gray-600">
                                Barang elektronik bekas seperti handphone, laptop, TV, dan perangkat elektronik lainnya.
                            </p>
                        </div>
                    </div>

                    <!-- Sampah Kaleng -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="h-48 bg-lightGreen overflow-hidden">
                            <img
                                src="/public/assets/img/sampah-kaleng.jpg"
                                alt="Sampah Kertas"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-3">Sampah Kaleng</h3>
                            <p class="text-gray-600">
                                Kaleng minuman, kaleng makanan, wadah berbahan logam, serta berbagai jenis kaleng lain
                                yang bersih dan tidak berkarat.
                            </p>
                        </div>
                    </div>

                    <!-- Sampah Yang Tidak Diangkut -->
                    <div
                        class="bg-red-50 rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105 border-l-4 border-red-500">
                        <div class="p-6 text-start">
                            <h3 class="text-xl font-bold text-red-600 mb-3">Sampah Yang Tidak Bisa Diangkut</h3>
                            <ul class="space-y-2 flex flex-col">
                                <li class="flex items-start">
                                    <i data-feather="x" class="text-red-500 w-5 h-5 mr-3 mt-0.5 shrink-0"></i>
                                    <span class="text-gray-600"
                                        >Sampah kayu seperti serbuk gergaji, sisa-sisa produksi mebel, dan potongan kayu
                                        lainnya.</span
                                    >
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="x" class="text-red-500 w-5 h-5 mr-3 mt-0.5 shrink-0"></i>
                                    <span class="text-gray-600"
                                        >Sampah pecahan kaca seperti pecahan botol minuman, gelas kaca, kaca jendela,
                                        dan lainnya.
                                    </span>
                                </li>

                                <li class="flex items-start">
                                    <i data-feather="x" class="text-red-500 w-5 h-5 mr-3 mt-0.5 shrink-0"></i>
                                    <span class="text-gray-600"
                                        >Sampah konstruksi seperti puing bangunan, asbes, dan material berbahaya
                                        lainnya.</span
                                    >
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="x" class="text-red-500 w-5 h-5 mr-3 mt-0.5 shrink-0"></i>
                                    <span class="text-gray-600"
                                        >Sampah medis seperti jarum suntik, obat-obatan, dan perban bekas.</span
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<section id="tata-cara" class="py-20 bg-white">
            <div class="container mx-auto px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Tata Cara Penggunaan Website</h2>
                    <div class="w-16 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Ikuti langkah-langkah sederhana berikut untuk mulai menggunakan layanan Bank Sampah:
                    </p>
                </div>

                <!-- Carousel -->
                <div class="relative overflow-hidden max-w-5xl mx-auto">
                    <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
                        <!-- Item 1: Cara Mendaftar -->
                        <div class="carousel-item min-w-full px-4">
                            <div class="bg-gray-50 rounded-lg shadow-sm p-8 flex flex-col md:flex-row items-center">
                                <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                                    <div class="bg-primary w-20 h-20 rounded-full flex items-center justify-center">
                                        <i data-feather="user-plus" class="text-white w-8 h-8"></i>
                                    </div>
                                </div>
                                <div class="md:w-2/3 md:pl-8">
                                    <h3 class="text-2xl font-bold text-secondary mb-4">Cara Mendaftar</h3>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Buat akun di website Bank Sampah dengan mengisi data diri Anda. Proses
                                        pendaftaran sangat mudah dan cepat.
                                    </p>
                                    <ul class="space-y-2 text-gray-600">
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-lightGreen w-5 h-5 mr-2 mt-0.5"></i>
                                            <span>Kunjungi website dan klik tombol "Daftar"</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-lightGreen w-5 h-5 mr-2 mt-0.5"></i>
                                            <span>Isi formulir dengan data diri yang valid</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-lightGreen w-5 h-5 mr-2 mt-0.5"></i>
                                            <span>Buat kata sandi yang kuat</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Item 2: Cara Mengajukan Pengambilan Sampah -->
                        <div class="carousel-item min-w-full px-4">
                            <div class="bg-gray-50 rounded-lg shadow-sm p-8 flex flex-col md:flex-row items-center">
                                <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                                    <div class="bg-lightGreen w-20 h-20 rounded-full flex items-center justify-center">
                                        <i data-feather="truck" class="text-white w-8 h-8"></i>
                                    </div>
                                </div>
                                <div class="md:w-2/3 md:pl-8">
                                    <h3 class="text-2xl font-bold text-secondary mb-4">
                                        Cara Mengajukan Pengambilan Sampah
                                    </h3>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Ajukan pengambilan sampah sesuai dengan waktu yang Anda inginkan melalui
                                        website.
                                    </p>
                                    <ul class="space-y-2 text-gray-600">
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-lightGreen w-5 h-5 mr-2 mt-0.5"></i>
                                            <span>Login ke akun Bank Sampah Anda</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-lightGreen w-5 h-5 mr-2 mt-0.5"></i>
                                            <span>Pilih menu "Ajukan Pengambilan"</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i
                                                data-feather="check"
                                                class="text-lightGreen w-5 h-5 mr-2 mt-0.5 shrink-0"></i>
                                            <span>Anda akan diarahkan menuju halaman whatsapp</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Item 3: Cara Membayar Iuran Bulanan -->
                        <div class="carousel-item min-w-full px-4">
                            <div class="bg-gray-50 rounded-lg shadow-sm p-8 flex flex-col md:flex-row items-center">
                                <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                                    <div class="bg-secondary w-20 h-20 rounded-full flex items-center justify-center">
                                        <i data-feather="credit-card" class="text-white w-8 h-8"></i>
                                    </div>
                                </div>
                                <div class="md:w-2/3 md:pl-8">
                                    <h3 class="text-2xl font-bold text-secondary mb-4">Cara Membayar Iuran Bulanan</h3>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Bayar iuran bulanan dengan mudah melalui berbagai metode pembayaran yang
                                        tersedia.
                                    </p>
                                    <ul class="space-y-2 text-gray-600">
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-lightGreen w-5 h-5 mr-2 mt-0.5"></i>
                                            <span>Login ke akun Bank Sampah Anda</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i data-feather="check" class="text-lightGreen w-5 h-5 mr-2 mt-0.5"></i>
                                            <span>Pilih menu "Iuran"</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i
                                                data-feather="check"
                                                class="text-lightGreen w-5 h-5 mr-2 mt-0.5 shrink-0"></i>
                                            <span>Masukkan nominal iuran sebesar Rp 25.000</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Item 4: Cara Melakukan Pembelian Barang -->
                        <div class="carousel-item min-w-full px-4">
                            <div class="bg-gray-50 rounded-lg shadow-sm p-8 flex flex-col md:flex-row items-center">
                                <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                                    <div class="bg-lightOrange w-20 h-20 rounded-full flex items-center justify-center">
                                        <i data-feather="shopping-bag" class="text-white w-8 h-8"></i>
                                    </div>
                                </div>
                                <div class="md:w-2/3 md:pl-8">
                                    <h3 class="text-2xl font-bold text-secondary mb-4">
                                        Cara Melakukan Pembelian Barang
                                    </h3>
                                    <p class="text-gray-600 mb-4 leading-relaxed">
                                        Gunakan saldo tabungan Anda untuk membeli berbagai produk ramah lingkungan.
                                    </p>
                                    <ul class="space-y-2 text-gray-600">
                                        <li class="flex items-start">
                                            <i
                                                data-feather="check"
                                                class="text-lightGreen w-5 h-5 mr-2 mt-0.5 shrink-0"></i>
                                            <span>Datang ke toko BUM Desa DADI JAYA Sumberdadi</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i
                                                data-feather="check"
                                                class="text-lightGreen w-5 h-5 mr-2 mt-0.5 shrink-0"></i>
                                            <span>Pilih barang apa yang Anda inginkan</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i
                                                data-feather="check"
                                                class="text-lightGreen w-5 h-5 mr-2 mt-0.5 shrink-0"></i>
                                            <span>Bayar barang belanjaan Anda dengan saldo tabungan Anda</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Controls -->
                    <button
                        id="prevBtn"
                        class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-primary hover:text-lightOrange focus:outline-none">
                        <i data-feather="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button
                        id="nextBtn"
                        class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-primary hover:text-lightOrange focus:outline-none">
                        <i data-feather="chevron-right" class="w-5 h-5"></i>
                    </button>

                    <!-- Carousel Indicators -->
                    <div class="flex justify-center mt-8 space-x-2">
                        <button
                            class="carousel-indicator w-3 h-3 rounded-full bg-primary opacity-100"
                            data-index="0"></button>
                        <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300" data-index="1"></button>
                        <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300" data-index="2"></button>
                        <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300" data-index="3"></button>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a
                        href="tata-cara.html"
                        class="inline-block bg-primary text-white font-bold px-8 py-3 rounded-lg hover:bg-lightOrange transition duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </section>

    <!-- Footer -->
    <footer class="bg-gray-700 text-white py-12">
            <div class="container mx-auto px-8">
                <div class="flex flex-col md:flex-row justify-between gap-10">
                    <!-- Brand & Description -->
                    <div class="md:w-1/3">
                        <div class="flex items-center mb-6">
                            <img
                                src="/public/assets/logo/logo-bank-sampah.svg"
                                alt="Logo Bank Sampah"
                                class="w-20 h-20 mr-3" />
                            <span class="font-bold text-xl leading-tight"> Bank Sampah <br />Sumber Pawana </span>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Solusi pengelolaan sampah terpadu untuk lingkungan yang lebih bersih dan berkelanjutan.
                        </p>
                    </div>

                    <!-- Footer Links -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 md:w-2/3">
                        <!-- Layanan -->
                        <div>
                            <h3 class="font-bold text-lg mb-4">Layanan</h3>
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
                            <h3 class="font-bold text-lg mb-4">Perusahaan</h3>
                            <ul class="space-y-3 text-gray-300">
                                <li><a href="#tentang" class="hover:text-primary">Tentang Kami</a></li>
                                <li><a href="#jenis-sampah" class="hover:text-primary">Jenis Sampah</a></li>
                                <li><a href="#tata-cara" class="hover:text-primary">Tata Cara</a></li>
                                <li><a href="#masuk-petugas" class="hover:text-primary">Masuk Petugas</a></li>
                            </ul>
                        </div>

                        <!-- Kontak -->
                        <div>
                            <h3 class="font-bold text-lg mb-4">Kontak</h3>
                            <ul class="space-y-3 text-gray-300">
                                <li class="flex items-start">
                                    <i data-feather="map-pin" class="w-5 h-5 mt-1 mr-3 text-primary shrink-0"></i>
                                    <span>
                                        Jl. Raya Sumbergempol No.1, Gempol, Sumberdadi, Kec. Sumbergempol,<br />
                                        Kabupaten Tulungagung, Jawa Timur 66291
                                    </span>
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="phone" class="w-5 h-5 mt-1 mr-3 text-primary"></i>
                                    <span>+62 896 616 337 33</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="mail" class="w-5 h-5 mt-1 mr-3 text-primary"></i>
                                    <span>info@banksampah.id</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-600 mt-10 pt-6 text-center text-gray-400 text-sm">
                    &copy; 2025 Bank Sampah Sumber Pawana. Hak Cipta Dilindungi.
                </div>
            </div>
        </footer>
</x-landing-layout>
