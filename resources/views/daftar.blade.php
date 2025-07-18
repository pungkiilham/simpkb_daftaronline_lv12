@include('layouts.head')

</html>

{{-- @include('layouts.head') --}}

<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    @include('layouts.navhome')

    <!-- Hero Section -->
    <div class="pt-24 pb-16 bg-gradient-to-br from-[#1a237e] to-[#283593] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-xl md:text-3xl font-bold text-white">Selamat Datang di</h2>
                <h2 class="text-3xl md:text-5xl font-bold text-blue-200">Pendaftaran Online Uji KIR</h2>
                {{-- <p class="mt-1 text-gray-600">Sistem Informasi Manajemen PKB</p> --}}
                <p class="mt-3 max-w-md mx-auto text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Silahkan untuk memilih jenis layanan yang akan Anda gunakan dan melengkapi data yang dibutuhkan
                    dibawah ini.
                </p>
                {{-- <div class="mt-8 max-w-md grid grid-cols-2 items-center justify-center gap-4 md:gap-6"> --}}
                {{-- <div class="mt-8 flex justify-center items-center gap-2">

                    <a href="{{ route('daftar') }}"
                        class="items-center px-8 py-3 shadow border border-transparent text-base font-medium rounded-md text-[#1a237e] bg-white hover:bg-gray-100">
                        Daftar Baru
                    </a>
                    <a href="{{ route('status') }}"
                        class="items-center px-8 py-3 border border-white text-base font-medium rounded-md text-white hover:bg-white hover:text-[#1a237e] transition duration-150 ease-in-out">
                        Perpanjang
                    </a>
                </div> --}}
                {{-- <select
                    class="w-1/2 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                    <div class="text-black">
                        <option value="">Pilih Jenis Layanan</option>
                        <option value="baru">Baru</option>
                        <option value="berkala">Berkala</option>
                        <option value="mutasi_keluar">Mutasi Keluar</option>
                        <option value="mutasi_masuk">Mutasi Masuk</option>
                        <option value="numpang_keluar">Numpang Keluar</option>
                        <option value="numpang_masuk">Numpang Masuk</option>
                        <option value="hilang">Cetak Hilang</option>
                        <option value="rusak">Cetak Rusak</option>
                        <option value="perubahan">Ubah Sifat/Bentuk</option>
                        <option value="lainnya">Lainnya (Rusak/Hilang)</option>
                    </div>
                </select> --}}
            </div>

        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-xl shadow-lg p-3 md:p-4">

        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-[#1a237e]">Lengkapi Untuk Mendaftar</h2>
                    <p class="mt-4 text-lg text-gray-600">Silahkan untuk melengkapi data dibawah ini untuk mendaftar layanan di UPT. Pengujian Kendaaran Bermotor Kota Batu secara online.</p>
                </div>
                <!-- Form Section -->
                <form class="space-y-6">

                    <div class=" p-3 md:p-4 mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <!-- Data Pemilik Section -->
                            <div class="">
                                <div
                                    class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4">
                                    <h2 class="text-lg font-bold text-white">1. Data Pemilik</h2>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik</label>
                                        <input type="text"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Masukkan nama pemilik">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor KTP</label>
                                        <input type="text"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Masukkan nomor KTP">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                            WhatsApp</label>
                                        <input type="tel"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Masukkan nomor WhatsApp">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <!-- Data Kendaraan Section -->
                            <div class="">
                                <div
                                    class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4">
                                    <h2 class="text-lg font-bold text-white">2. Data Kendaraan</h2>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Polisi</label>
                                        <input type="text"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Masukkan nomor polisi">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Uji</label>
                                        <input type="text"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Masukkan nomor mesin">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Layanan</label>
                                        <select
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                            <option value="">Pilih Tanggal</option>
                                            <option value="baru">16 Maret 2025 - Sisa 20</option>
                                            <option value="berkala">17 Maret 2025 - Sisa 13</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="p-3 md:p-4 mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <!-- Data Pengujian Section -->
                            <div class="pb-4">
                                <div
                                    class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4">
                                    <h2 class="text-lg font-bold text-white">3. Dokumen Persyaratan</h2>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis
                                            Layanan</label>
                                        <select
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                            <option value="">Pilih Jenis Layanan</option>
                                            <option value="baru">Baru</option>
                                            <option value="berkala">Berkala</option>
                                            <option value="mutasi_keluar">Mutasi Keluar</option>
                                            <option value="mutasi_masuk">Mutasi Masuk</option>
                                            <option value="numpang_keluar">Numpang Keluar</option>
                                            <option value="numpang_masuk">Numpang Masuk</option>
                                            <option value="hilang">Cetak Hilang</option>
                                            <option value="rusak">Cetak Rusak</option>
                                            <option value="perubahan">Ubah Sifat/Bentuk</option>
                                            <option value="lainnya">Lainnya (Rusak/Hilang)</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                            Pengujian</label>
                                        <input type="date"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-3">
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Daftar
                        </button>
                    </div>

                </form>
            </div>


            <!-- Footer -->
            {{-- <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('assets/logoestro.png') }}" alt="Logo" class="h-8 w-auto mr-3">
                    <span class="text-xl font-bold text-[#1a237e]">CV. ESTRO HUTAMA</span>
                </div>
                <p class="text-gray-500 text-center">Powered by CV. ESTRO HUTAMA<br>&copy; {{ date('Y') }} All
                    rights reserved.</p>
            </div>
        </div>
    </footer> --}}
</body>

</html>
