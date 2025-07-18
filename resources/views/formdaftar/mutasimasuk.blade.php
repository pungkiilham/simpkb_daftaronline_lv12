@include('layouts.head')

{{-- @include('layouts.head') --}}

<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    @include('layouts.navhome')

    <!-- Hero Section -->
    <div class="pt-24 pb-16 bg-gradient-to-br from-[#1a237e] to-[#283593] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-xl md:text-3xl font-bold text-white">Anda Mendaftar Untuk</h2>
                <h2 class="text-3xl md:text-5xl font-bold text-blue-200">Layanan Mutasi Masuk</h2>
                {{-- <p class="mt-1 text-gray-600">Sistem Informasi Manajemen PKB</p> --}}
                <p class="mt-3 max-w-md mx-auto text-base text-gray-200 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Silahkan untuk melengkapi data dibawah ini untuk mendaftar
                    layanan di UPT. Pengujian Kendaaran Bermotor Kota Batu secara online.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-xl shadow-lg p-3 md:p-4">
        <div class="py-10 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{-- <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-[#1a237e]">Daftar Layanan Daftar Baru</h2>
                    <p class="mt-4 text-lg text-gray-600">Silahkan untuk melengkapi data dibawah ini untuk mendaftar
                        layanan di UPT. Pengujian Kendaaran Bermotor Kota Batu secara online.</p>
                </div> --}}
                <!-- Form Section -->
                <form class="space-y-6">

                    <div class=" p-3 md:p-4 mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Left Column -->
                            <!-- Data Pemilik Section -->
                            <div class="">
                                <div
                                    class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4">
                                    <h2 class="text-lg font-bold text-white">1. Data Kendaraan</h2>
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
                                            Telepon</label>
                                        <input type="tel"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Masukkan nomor WhatsApp">
                                    </div>
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
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                            Layanan</label>
                                        <select
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                            <option value="">Pilih Tanggal</option>
                                            <option value="baru">16 Maret 2025 - Sisa 20</option>
                                            <option value="berkala">17 Maret 2025 - Sisa 13</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <!-- Dokumen Persyaratan Section -->
                            <div class="">
                                <div
                                    class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4">
                                    <h2 class="text-lg font-bold text-white">2. Dokumen Persyaratan</h2>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Surat Kuasa (Jika
                                            dikuasakan)</label>
                                        <input type="file"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                        <label class="block text-sm  text-gray-500 mb-1">Format: PDF, JPG, JPEG, PNG
                                            (Max 2MB)</label>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">STNK
                                            Kendaraan</label>
                                        <input type="file"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                        <label class="block text-sm  text-gray-500 mb-1">Format: PDF, JPG, JPEG, PNG
                                            (Max 2MB)</label>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Kartu Uji Berkala /
                                            BLUe</label>
                                        <input type="file"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                        <label class="block text-sm  text-gray-500 mb-1">Format: PDF, JPG, JPEG, PNG
                                            (Max 2MB)</label>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Surat Rekom Daerah
                                            Asal</label>
                                        <input type="file"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                        <label class="block text-sm  text-gray-500 mb-1">Format: PDF, JPG, JPEG, PNG
                                            (Max 2MB)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-3">
                        <a type="button" href="/"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Batal
                        </a>
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
