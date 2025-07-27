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

        <!-- Main Content Container with Alpine.js Data Scope -->
        <div x-data="{ isOpen: false, currentImageSrc: '', currentImageAlt: '' }" class="bg-white rounded-xl shadow-lg p-3 md:p-4 w-full">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">

                @if (isset($error))
                    <div class="bg-red-200 text-red-600">
                        {{ $error }}
                    </div>
                @endif
                @if (isset($sukses))
                    <div class="bg-green-200 text-green-600">
                        {{ $sukses }}
                    </div>
                @endif

                <!-- Form Section -->
                {{-- <form class="space-y-6" action={{ route('pengujian-list.save_photo', ['id' => $id]) }} enctype="multipart/form-data"> --}}
                {{-- <form class="space-y-6"
                    action="{{ route('verifikasi', ['id' => isset($data) && $data->id ? $data->id : 0]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf --}}

                <div class="mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column - Data Kendaraan Section -->
                        <div class="">
                            <div
                                class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4">
                                <h2 class="text-lg font-bold text-white">1. Data Kendaraan</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik</label>
                                    <input type="text" disabled
                                        class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                        value="{{ $data->nama }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor KTP</label>
                                    <input type="text" disabled
                                        class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                        value="{{ $data->ktp }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                    <input type="tel" disabled
                                        class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                        value="{{ $data->telpon }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Polisi</label>
                                    <input type="text" disabled
                                        class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                        value="{{ $data->nopol }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Uji</label>
                                    <input type="text" disabled
                                        class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                        value="{{ $data->nouji }}">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Layanan</label>
                                    @if ($data->jenis_layanan == 1)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Baru">
                                    @endif
                                    @if ($data->jenis_layanan == 2)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Perpanjang">
                                    @endif
                                    @if ($data->jenis_layanan == 3)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Mutasi Masuk">
                                    @endif
                                    @if ($data->jenis_layanan == 3)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Mutasi Keluar">
                                    @endif
                                    @if ($data->jenis_layanan == 4)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Numpang Masuk">
                                    @endif
                                    @if ($data->jenis_layanan == 5)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Numpang Keluar">
                                    @endif
                                    @if ($data->jenis_layanan == 7)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Perubahan">
                                    @endif
                                    @if ($data->jenis_layanan == 9)
                                        <input type="text" disabled
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="Lainnya">
                                    @endif
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Layanan</label>
                                    <input type="text" disabled
                                        class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                        value="{{ date('d M Y', strtotime($data->tanggal_layanan)) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Dokumen Persyaratan Section -->
                        <div class="">
                            <div
                                class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4">
                                <h2 class="text-lg font-bold text-white">2. Dokumen Persyaratan</h2>
                            </div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Klik salah satu untuk melihat
                                dokumen</label>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->surat_kuasa ?? '')) }}; currentImageAlt = 'Surat Kuasa Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    1. Surat Kuasa
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->stnk ?? '')) }}; currentImageAlt = 'STNK Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    2. STNK
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->srut ?? '')) }}; currentImageAlt = 'SRUT Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    3. SRUT
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->fiskal ?? '')) }}; currentImageAlt = 'Fiskal Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    4. Fiskal
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->kartu_uji ?? '')) }}; currentImageAlt = 'Kartu Uji Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    5. Kartu Uji
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->rekom_asal ?? '')) }}; currentImageAlt = 'Rekom Asal Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    6. Rekom Asal
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->izin_trayek ?? '')) }}; currentImageAlt = 'Izin Trayek Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    7. Izin Trayek
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->tera ?? '')) }}; currentImageAlt = 'Tera Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    8. Tera
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-center mt-4">
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->surat_permohonan ?? '')) }}; currentImageAlt = 'Surat Permohonan Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    9. Surat Permohonan
                                </button>
                                <button type="button"
                                    @click="isOpen = true; currentImageSrc = {{ Js::from(url('storage') . '/' . ($data->surat_keterangan ?? '')) }}; currentImageAlt = 'Surat Keterangan Document';"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-500 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    10. Surat Keterangan
                                </button>
                            </div>

                            <form ction={{ route('verifikasi', ['id' => $data->id]) }} enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div
                                    class="flex justify-between items-center bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg px-2 py-1 mb-4 mt-6">
                                    <h2 class="text-lg font-bold text-white">3. Hasil Verifikasi</h2>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-center">
                                    <div>
                                        <label class="block text-sm text-left font-medium text-gray-700 mb-1"
                                            for="status_pendaftaran">Verifikasi Pendaftaran</label>
                                        <select id="status_pendaftaran" name="status_pendaftaran"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                            <option value="0"
                                                {{ isset($data->status_pendaftaran) && $data->status_pendaftaran == 0 ? 'selected' : '' }}>
                                                Pilih Hasil</option>
                                            <option value="1"
                                                {{ isset($data->status_pendaftaran) && $data->status_pendaftaran == 1 ? 'selected' : '' }}>
                                                Diterima</option>
                                            <option value="2"
                                                {{ isset($data->status_pendaftaran) && $data->status_pendaftaran == 2 ? 'selected' : '' }}>
                                                Ditolak</option>
                                        </select>

                                        <label class="block text-sm text-left font-medium text-gray-700 mb-1 mt-4"
                                            for="no_antrian">No Antrian</label>
                                        <input type="number" id="no_antrian" name="no_antrian"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            value="{{ $data->no_antrian ?? '' }}"> {{-- Pre-fill with data, now editable --}}
                                    </div>
                                    <div>
                                        <label class="block text-sm text-left font-medium text-gray-700 mb-1"
                                            for="keterangan_ditolak">Keterangan Ditolak</label>
                                        <textarea rows="4" id="keterangan_ditolak" name="keterangan_ditolak"
                                            class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                            placeholder="Keterangan">{{ $data->keterangan_ditolak ?? '' }}</textarea> {{-- Pre-fill with data, now editable --}}
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="flex justify-end space-x-3">
                                    <a type="button" href="dashboard"
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


                </form>
            </div>

            <!-- Dialog Backdrop and Modal Container (moved inside the x-data scope) -->
            <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0  flex items-center justify-center z-50 p-4" @click.self="isOpen = false"
                {{-- Close dialog when clicking on the backdrop --}} @keydown.escape.window="isOpen = false" {{-- Close dialog with Escape key --}} x-cloak>
                <!-- Dialog Panel -->
                <div x-show="isOpen" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-xl mx-auto transform transition-all overflow-hidden border-6 border-[#181947]"
                    role="dialog" aria-modal="true" aria-labelledby="modal-title">
                    <!-- Dialog Header -->
                    <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                        <h3 id="modal-title" class="text-xl font-semibold text-gray-900">Dokumen Persyaratan</h3>
                        <button @click="isOpen = false"
                            class="text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded-full p-1 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Dialog Content - Now displays an image -->
                    <div class="mt-4 text-gray-700 flex flex-col items-center">
                        <p class="mb-4 text-center">Berikut adalah pratinjau dokumen:</p>
                        <template x-if="currentImageSrc"> {{-- Only show image if source is set --}}
                            <img :src="currentImageSrc" :alt="currentImageAlt"
                                class="max-w-full h-auto rounded-lg shadow-md mb-4 object-contain"
                                onerror="this.onerror=null;this.src='https://placehold.co/400x300/CCCCCC/000000?text=Gambar+Tidak+Tersedia';">
                        </template>
                        <p x-show="!currentImageSrc" class="text-center text-gray-500">Tidak ada gambar yang dipilih.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
