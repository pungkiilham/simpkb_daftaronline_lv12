@extends('layouts.admin')

@section('content')
    <div class="p-1 md:p-3">
        <!-- Header -->
        <div class="mb-6 md:mb-8">
            <div class="flex items-center mb-2">
                <div class="p-1.5 md:p-2 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg mr-2 md:mr-3">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Verifikasi Data Pendaftaran Online</h1>
            </div>
            <p class="text-xs md:text-sm text-gray-600 ml-10 md:ml-14">Silahkan untuk melakukan verifikasi kelengkapann dan
                kesesuaian data pendaftaran layanan.</p>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-lg p-3 md:p-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{-- <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-[#1a237e]">Daftar Layanan Daftar Baru</h2>
                    <p class="mt-4 text-lg text-gray-600">Silahkan untuk melengkapi data dibawah ini untuk mendaftar
                        layanan di UPT. Pengujian Kendaaran Bermotor Kota Batu secara online.</p>
                </div> --}}
                <!-- Form Section -->
                <form class="space-y-6">

                    <div class="mb-8">
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
                                        <input type="text"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Tannggal layanan">
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
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
