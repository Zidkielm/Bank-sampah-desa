<div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-800 opacity-70 dark:opacity-80 transition-opacity z-40"></div>

    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0 relative z-50">
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            @click.away="showModal = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <form action="{{ route('admin.nasabah.store') }}" method="POST" x-data="{ showPassword: false }">
                @csrf
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Tambah Data
                                Nasabah</h3>

                            <div class="mb-4">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan nama nasabah">
                            </div>

                            <div class="mb-4">
                                <label for="username"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="username" id="username" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan username">
                            </div>

                            <div class="mb-4">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password <span
                                        class="text-red-500">*</span></label>
                                <div class="relative mt-1 flex">
                                    <input :type="showPassword ? 'text' : 'password'" name="password" id="password"
                                        required
                                        class="block w-full rounded-md border-gray-300 dark:border-gray-600
                                        shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                        dark:bg-gray-700 dark:text-white"
                                        placeholder="Masukkan password">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                                        @click="showPassword = !showPassword">
                                        <i x-show="!showPassword" data-feather="eye"
                                            class="h-5 w-5 text-gray-400 hover:text-gray-600"></i>
                                        <i x-show="showPassword" data-feather="eye-off"
                                            class="h-5 w-5 text-gray-400 hover:text-gray-600"></i>
                                    </div>
                                </div>
                                {{-- <div class="mt-2">
                                    <button type="button" onclick="generatePassword()"
                                        class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white
                                        bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800">
                                        <i data-feather="refresh-cw" class="mr-1.5 h-3 w-3"></i>
                                        Generate Password
                                    </button>
                                </div> --}}
                            </div>

                            <div class="mb-4">
                                <label for="alamat"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat <span
                                        class="text-gray-400 dark:text-gray-500">(opsional)</span></label>
                                <textarea name="alamat" id="alamat" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                    shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50
                                    dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan alamat nasabah"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                        bg-orange-500 text-base font-medium text-white hover:bg-orange-600
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500
                        dark:focus:ring-offset-gray-800 sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" @click="showModal = false"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600
                        shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300
                        hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-orange-500 dark:focus:ring-offset-gray-800 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function generatePassword() {
        const uppercase = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        const lowercase = 'abcdefghijkmnopqrstuvwxyz';
        const numbers = '23456789';
        const symbols = '!@#$%^&*()_+-=[]{}|;:,.<>?';

        const length = Math.floor(Math.random() * 5) + 8;

        let password = '';

        password += uppercase.charAt(Math.floor(Math.random() * uppercase.length));
        password += lowercase.charAt(Math.floor(Math.random() * lowercase.length));
        password += numbers.charAt(Math.floor(Math.random() * numbers.length));
        password += symbols.charAt(Math.floor(Math.random() * symbols.length));

        const allChars = uppercase + lowercase + numbers + symbols;
        for (let i = password.length; i < length; i++) {
            password += allChars.charAt(Math.floor(Math.random() * allChars.length));
        }

        password = password.split('').sort(() => 0.5 - Math.random()).join('');

        document.getElementById('password').value = password;
    }
</script>
