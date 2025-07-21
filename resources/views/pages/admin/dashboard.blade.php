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
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Dashboard Pendaftaran Online Harian</h1>
            </div>
            <p class="text-xs md:text-sm text-gray-600 ml-10 md:ml-14">Selamat datang di Sistem Informasi Manajemen
                Pengujian Kendaraan Bermotor - Pendaftaran Online</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
            <!-- Total Kendaraan -->
            <div
                class="bg-gradient-to-br from-indigo-500 via-blue-500 to-blue-600 rounded-xl shadow-lg p-4 md:p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-3 md:mb-4">
                    <div class="p-1.5 md:p-2 bg-white/20 rounded-lg backdrop-blur-lg">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                    </div>
                    <span class="text-xs md:text-sm font-medium text-white/90">Total Kendaraan Hari Ini</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-bold text-white">12/40</h3>
                    </div>
                </div>
            </div>

            <!-- Kendaraan Lulus Uji -->
            <div
                class="bg-gradient-to-br from-emerald-400 via-emerald-500 to-teal-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-white/10 rounded-lg backdrop-blur-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-white/80">Diterima</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-white">9/40</h3>
                    </div>
                </div>
            </div>

            <!-- Kendaraan Dalam Proses -->
            <div
                class="bg-gradient-to-br from-amber-400 via-amber-500 to-orange-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-white/10 rounded-lg backdrop-blur-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-white/80">Dalam Proses</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-white">2/40</h3>
                    </div>
                </div>
            </div>

            <!-- Kendaraan Tidak Lulus -->
            <div
                class="bg-gradient-to-br from-rose-400 via-rose-500 to-red-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-white/10 rounded-lg backdrop-blur-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-white/80">Ditolak</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-white">1/40</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-lg p-3 md:p-4">
            <!-- Tools Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-4">
                {{-- <div class="relative w-full md:w-64">
                            <input type="text" placeholder="Cari..."
                                class="w-full pl-10 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                            <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div> --}}

                <div class="flex justify-ends gap-6">
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Layanan:</label>
                        <select
                            class="text-sm border border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                            <option value="all">Semua</option>
                            <option value="baru">Baru</option>
                            <option value="berkala">Berkala</option>
                            <option value="numpang">Numpang</option>
                            <option value="mutasi">Mutasi</option>
                            <option value="perubahan">Perubahan</option>
                            <option value="cetak">Cetak Ulang</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Status:</label>
                        <select
                            class="text-sm border border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                            <option value="all">Semua</option>
                            <option value="ongoing">Belum</option>
                            <option value="approved">Diterima</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto -mx-3 md:-mx-4">
                <div class="inline-block min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th
                                    class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                    No</th>
                                <th
                                    class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-left whitespace-nowrap">
                                    Nama Pemilik</th>
                                <th
                                    class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                    No. Pol / Uji</th>
                                <th
                                    class="hidden md:table-cell px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                    Jenis Layanan</th>
                                <th
                                    class="hidden lg:table-cell px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                    Tanggal Layanan</th>
                                <th
                                    class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                    Status</th>
                                <th
                                    class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pendaftaran as $k)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-2 py-2 text-sm text-gray-900">
                                        <div class="flex flex-col">
                                            <span class="font-medium">{{ $k->nama }}</span>
                                        </div>
                                    </td>
                                    <td class="px-2 py-2 text-sm text-gray-900">
                                        <div class="flex flex-col space-y-1 text-center">
                                            <span>{{ $k->nopol }}</span>
                                            <span>{{ $k->nouji }}</span>
                                        </div>
                                    </td>
                                    @if ($k->jenis_layanan == 1)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Baru</td>
                                    @elseif ($k->jenis_layanan == 2)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Berkala</td>
                                    @elseif ($k->jenis_layanan == 3)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Mutasi Masuk</td>
                                    @elseif ($k->jenis_layanan == 4)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Mutasi Keluar</td>
                                    @elseif ($k->jenis_layanan == 5)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Numpang Masuk</td>
                                    @elseif ($k->jenis_layanan == 6)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Numpang Keluar</td>
                                    @elseif ($k->jenis_layanan == 7)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Perubahan</td>
                                    @elseif ($k->jenis_layanan == 8)
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            Lainnya</td>
                                    @else
                                        <td
                                            class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                            -</td>
                                    @endif
                                    <td
                                        class="hidden lg:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                        {{ date('d-m-Y', strtotime($k->tanggal_layanan)) }}</td>

                                    @if ($k->status_pendaftaran == null || $k->status_pendaftaran == 0)
                                        <td class="px-2 py-2 text-sm text-center whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Belum</span>
                                        </td>
                                    @elseif($k->status_pendaftaran == 2)
                                        <td class="px-2 py-2 text-sm text-center whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                                        </td>
                                    @elseif($k->status_pendaftaran == 1)
                                        <td class="px-2 py-2 text-sm text-center whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Diterima</span>
                                        </td>
                                    @endif
                                    <td class="px-2 py-2 text-sm text-center whitespace-nowrap">
                                        <div class="flex justify-center items-center space-x-2">
                                            <a href="#" class="text-blue-600 hover:text-blue-800" title="Lihat">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            {{-- <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">1</td>
                                <td class="px-2 py-2 text-sm text-gray-900">
                                    <div class="flex flex-col">
                                        <span class="font-medium">John Doe</span>
                                    </div>
                                </td>
                                <td class="px-2 py-2 text-sm text-gray-900">
                                    <div class="flex flex-col space-y-1 text-center">
                                        <span>N 1234 AB</span>
                                        <span>UJIAB123456</span>
                                    </div>
                                </td>
                                <td
                                    class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                    Numpang Masuk</td>
                                <td
                                    class="hidden lg:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                    12 Agustus 2025</td>
                                <td class="px-2 py-2 text-sm text-center whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                                </td>
                                <td class="px-2 py-2 text-sm text-center whitespace-nowrap">
                                    <div class="flex justify-center items-center space-x-2">
                                        <a href="#" class="text-blue-600 hover:text-blue-800" title="Lihat">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- <!-- Pagination -->
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <label class="text-sm text-gray-600 mr-2">Baris per halaman:</label>
                    <select
                        class="text-sm border border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
                <div class="flex items-center space-x-2">
                    <button
                        class="px-3 py-1 text-sm text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50"
                        disabled>
                        Previous
                    </button>
                    <div class="text-sm text-gray-500">Page 1 of 1</div>
                    <button
                        class="px-3 py-1 text-sm text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50"
                        disabled>
                        Next
                    </button>
                </div>
            </div> --}}
        </div>
    @endsection
