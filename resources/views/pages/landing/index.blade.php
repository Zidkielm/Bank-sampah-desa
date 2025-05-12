<x-landing-layout>
    <!-- Header/Navigation -->
    <header class="bg-white py-4 px-6 md:px-12 shadow-sm">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="h-10 w-10 bg-orange-500 rounded-md flex items-center justify-center mr-2">
                    <span class="text-white font-bold text-xl">B</span>
                </div>
                <div class="text-gray-800 font-semibold leading-tight">
                    <div>Bank Sampah</div>
                    <div>Sumber Pawana</div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-800 hover:text-orange-500">Home</a>
                <a href="#tentang-kami" class="text-gray-800 hover:text-orange-500">Tentang kami</a>
                <a href="#" class="text-gray-800 hover:text-orange-500">FAQ</a>
                <a href="#" class="text-gray-800 hover:text-orange-500">Kontak</a>
            </nav>

            <!-- Auth Buttons -->
            <div class="flex items-center space-x-3">
                <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md transition">Masuk</a>
                <a href="#" class="border border-green-500 text-green-500 hover:bg-green-500 hover:text-white px-4 py-2 rounded-md transition">Daftar</a>
            </div>

            <!-- Mobile Menu Button (hidden on desktop) -->
            <button class="md:hidden text-gray-800">
                <i data-feather="menu"></i>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative h-[500px] bg-gray-900 text-white">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 bg-black/40 z-10"></div>
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/hero-waste-management.jpg');"></div>

        <!-- Hero Content -->
        <div class="container mx-auto px-6 md:px-12 relative z-20 h-full flex items-center">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Kelola Sampah, Wujudkan Desa Bersih dan Berdaya</h1>
                <p class="text-lg mb-8">
                    Bergabunglah dengan program Bank Sampah Desa Sumberdadi untuk lingkungan yang lebih baik dan ekonomi warga yang lebih kuat. Setorkan sampah, kumpulkan tabungan, dan jadilah bagian dari perubahan.
                </p>
                <a href="#" class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-medium transition">
                    Setor sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <x-button class="fixed bottom-4 right-4 bg-orange-500 hover:bg-orange-600 text-white rounded-full p-3 shadow-lg">
        <i data-feather="phone" class="text-white"></i>
    </x-button>
    
    <!-- About Section -->
    <section id="tentang-kami" class="py-16 px-6 md:px-12 bg-gray-50">
        <div class="container mx-auto">
            <!-- Section Label -->
            <div class="inline-block px-4 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium mb-6">
                Tentang kami
            </div>

            <!-- Section Heading -->
            <h2 class="text-3xl font-bold text-gray-800 mb-8 max-w-3xl">
                Membangun masa depan desa yang bersih dan mandiri melalui pengelolaan sampah berbasis komunitas.
            </h2>

            <!-- Content Grid -->
            <div class="grid md:grid-cols-2 gap-12 mt-12">
                <!-- Left Column - Image -->
                <div class="rounded-lg overflow-hidden">
                    <img src="/images/waste-collection.jpg" alt="Tim Bank Sampah mengumpulkan sampah" class="w-full h-full object-cover">
                </div>

                <!-- Right Column - Text -->
                <div class="flex flex-col justify-center">
                    <p class="text-gray-700 mb-6">
                        Bank Sampah Desa Sumberdadi hadir sebagai solusi inovatif untuk mengatasi permasalahan sampah sekaligus meningkatkan kesejahteraan masyarakat. Kami mengajak warga untuk memilah dan menabung sampah anorganik yang nantinya dapat ditukar menjadi nilai ekonomi. Dengan dukungan teknologi berbasis website, proses pencatatan, jadwal pengambilan, dan transaksi menjadi lebih transparan dan mudah diakses.
                    </p>
                    <p class="text-gray-700 mb-6">
                        Kami percaya bahwa perubahan besar dimulai dari langkah kecil di rumah sendiri. Melalui kolaborasi antara warga, petugas, dan pemerintah desa, Bank Sampah menjadi gerakan bersama menuju lingkungan yang sehat dan ekonomi yang lebih inklusif.
                    </p>

                    <!-- Quote Box -->
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 flex items-start space-x-4 mb-6">
                        <div class="bg-green-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">"Sampah Bukan Masalah, Tapi Peluang."</p>
                            <p class="text-sm text-gray-600">Inisiatif Bank Sampah Sumberdadi untuk Desa Tangguh dan Berkelanjutan.</p>
                        </div>
                    </div>

                    <p class="text-gray-700 mb-8">
                        Visi kami adalah menciptakan lingkungan desa yang sehat, bersih, dan berdaya dengan partisipasi aktif seluruh elemen masyarakat.
                    </p>

                    <a href="#" class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-md font-medium transition text-center">
                        More about us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Waste Categories Section -->
    <section class="py-16 px-6 md:px-12">
        <div class="container mx-auto text-center">
            <!-- Section Label -->
            <div class="inline-block px-4 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium mb-6">
                Kriteria sampah
            </div>

            <!-- Section Heading -->
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Berikut Sampah yang Dapat Anda Setorkan
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">
                Agar proses berjalan lancar, yuk posisikan sampah yang disetorkan sesuai dengan kategori yang diterima oleh petugas kami.
            </p>

            <!-- Waste Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Category 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="w-20 h-20 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Botol plastik</h3>
                    <p class="text-gray-600">
                        Kemasan air mineral, botol minuman, atau wadah sabun cair yang sudah kosong.
                    </p>
                </div>

                <!-- Category 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="w-20 h-20 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Kardus</h3>
                    <p class="text-gray-600">
                        Bekas kotak makanan, kardus minuman, atau pembungkus barang dari belanjaan.
                    </p>
                </div>

                <!-- Category 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="w-20 h-20 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Sisa Makanan</h3>
                    <p class="text-gray-600">
                        Nasi basi, kulit buah, sisa potongan sayur, atau makanan yang tidak dikonsumsi.
                    </p>
                </div>

                <!-- Category 4 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="w-20 h-20 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Daun Kering</h3>
                    <p class="text-gray-600">
                        Hasil sapuan halaman seperti daun, ranting kecil, dan potongan rumput.
                    </p>
                </div>

                <!-- Category 5 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="w-20 h-20 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Sampah kaleng</h3>
                    <p class="text-gray-600">
                        Sisa kemasan logam seperti kaleng susu, sarden, atau minuman kaleng.
                    </p>
                </div>

                <!-- Category 6 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <div class="w-20 h-20 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Elektronik Kecil</h3>
                    <p class="text-gray-600">
                        Baterai bekas, lampu kecil, atau alat elektronik rumah tangga mini.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-green-600 text-white">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <!-- Stat 1 -->
                <div class="flex items-center justify-center space-x-4">
                    <div class="bg-orange-500 p-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-left">
                        <div class="text-4xl font-bold">25K</div>
                        <div class="text-sm opacity-80">Biaya terjangkau</div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="flex items-center justify-center space-x-4">
                    <div class="bg-orange-500 p-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-left">
                        <div class="text-4xl font-bold">24/7</div>
                        <div class="text-sm opacity-80">akses online kapan saja</div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="flex items-center justify-center space-x-4">
                    <div class="bg-orange-500 p-3 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-left">
                        <div class="text-4xl font-bold">80%</div>
                        <div class="text-sm opacity-80">warga merasa terbantu</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 px-6 md:px-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Column 1 - Logo & About -->
                <div>
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 bg-orange-500 rounded-md flex items-center justify-center mr-2">
                            <span class="text-white font-bold text-xl">B</span>
                        </div>
                        <div class="text-white font-semibold leading-tight">
                            <div>Bank Sampah</div>
                            <div>Sumber Pawana</div>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Solusi inovatif untuk pengelolaan sampah berbasis komunitas yang berkelanjutan.
                    </p>
                </div>

                <!-- Column 2 - Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Layanan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Column 3 - Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400">Jl. Desa Sumberdadi No. 123, Kec. Bersih, Kab. Sejahtera</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-400">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-400">info@banksampahsumberpawana.id</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 4 - Newsletter -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Berlangganan</h3>
                    <p class="text-gray-400 mb-4">Dapatkan informasi terbaru tentang program dan kegiatan kami.</p>
                    <form class="flex">
                        <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-md w-full focus:outline-none text-gray-800">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-r-md transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">© 2023 Bank Sampah Sumber Pawana. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</x-landing-layout>
