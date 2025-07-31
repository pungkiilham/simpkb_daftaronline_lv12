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
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Pengaturan</h1>
            </div>
            <p class="text-xs md:text-sm text-gray-600 ml-10 md:ml-14">Berikut ini adalah pengaturan sistem Pendaftaran
                Online SIM PKB</p>
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

                <div class="flex justify-ends gap-2">
                    <form action={{ route('jml_max') }} enctype="multipart/form-data" method="POST"
                        class="flex items-center gap-2">
                        @csrf
                        <label class="text-sm text-gray-600">Batas Antrian:</label>
                        <select id="jml_max" name="jml_max"
                            class="text-sm border border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                            <option value="10" {{ isset($jml_max) && $jml_max == 10 ? 'selected' : '' }}>
                                10</option>
                            <option value="15" {{ isset($jml_max) && $jml_max == 15 ? 'selected' : '' }}>
                                15</option>
                            <option value="20" {{ isset($jml_max) && $jml_max == 20 ? 'selected' : '' }}>
                                20</option>
                            <option value="30" {{ isset($jml_max) && $jml_max == 30 ? 'selected' : '' }}>
                                30</option>
                            <option value="40" {{ isset($jml_max) && $jml_max == 40 ? 'selected' : '' }}>
                                40</option>
                            <option value="50" {{ isset($jml_max) && $jml_max == 50 ? 'selected' : '' }}>
                                50</option>
                            <option value="60" {{ isset($jml_max) && $jml_max == 60 ? 'selected' : '' }}>
                                60</option>
                            <option value="70" {{ isset($jml_max) && $jml_max == 70 ? 'selected' : '' }}>
                                70</option>
                            <option value="80" {{ isset($jml_max) && $jml_max == 80 ? 'selected' : '' }}>
                                80</option>
                        </select>

                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan
                        </button>
                    </form>

                    {{-- <div class="flex items-center gap-2">
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
                    </div> --}}
                </div>
                {{-- <button @click="$dispatch('open-modal')" type="button"
                    class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    + Tambah Pengguna
                </button> --}}

                <div x-data="{ isOpen: false }">
                    <!-- Button to Open Modal -->
                    <button @click="isOpen = true"
                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        + Tambah Pengguna
                    </button>

                    <!-- Modal Backdrop and Container -->
                    <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 p-4"
                        @click.self="isOpen = false" {{-- Close modal when clicking on the backdrop --}} @keydown.escape.window="isOpen = false"
                        {{-- Close modal with Escape key --}} x-cloak>
                        <!-- Modal Panel -->
                        <div x-show="isOpen" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-sm mx-auto transform transition-all overflow-hidden"
                            role="dialog" aria-modal="true" aria-labelledby="modal-title">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                                <h3 id="modal-title" class="text-xl font-semibold text-gray-900">Tambah Pengguna Baru</h3>
                                <button @click="isOpen = false"
                                    class="text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded-full p-1 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Content -->
                            <form action={{ route('user.store') }} enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="mt-4 text-gray-700">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama
                                                Pengguna</label>
                                            <input type="text" id="name" name="name"
                                                class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                                value="">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                            <input type="text" id="username" name="username"
                                                class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                                value="">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                                value="">
                                            <label class="block text-sm font-medium text-gray-400 mb-1">*Minimal 4
                                                Karakter</label>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi
                                                Password</label>
                                            <input type="password" id="repassword" name="repassword"
                                                class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2"
                                                value="">
                                            <label class="block text-sm font-medium text-gray-400 mb-1">*Tulis Ulang
                                                Password</label>

                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                            <select id="role" name="role"
                                                class="w-full rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all py-1 px-2">
                                                <option value=""> Pilih Role</option>
                                                <option value="1"> Super Admin</option>
                                                <option value="1"> Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Footer (Action Buttons) -->
                                <div class="mt-6 flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="inline-block min-w-full align-middle">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th
                                class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                No</th>
                            <th
                                class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-left whitespace-nowrap">
                                Nama Pengguna</th>
                            <th
                                class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                Username</th>
                            <th
                                class="hidden md:table-cell px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                Role</th>
                            <th
                                class="px-2 py-2 text-xs font-medium text-gray-700 uppercase tracking-wider text-center whitespace-nowrap">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($user as $k)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                    {{ $loop->iteration }}</td>
                                <td class="px-2 py-2 text-sm text-gray-900">
                                    <div class="flex flex-col">
                                        <span class="font-medium">{{ $k->name }}</span>
                                    </div>
                                </td>
                                <td class="px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                    {{ $k->username }}</td>
                                @if ($k->role == 0)
                                    <td
                                        class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                        Vendor</td>
                                @endif
                                @if ($k->role == 1)
                                    <td
                                        class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                        Super Admin</td>
                                @endif
                                @if ($k->role == 2)
                                    <td
                                        class="hidden md:table-cell px-2 py-2 text-sm text-gray-900 text-center whitespace-nowrap">
                                        Admin</td>
                                @endif
                                <td
                                    class="flex items-center justify-center gap-2 px-4 py-2 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="" class="text-emerald-600 hover:text-emerald-800" title="Lihat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a href={{ route('user.delete', ['id' => $k->id]) }} class="text-red-600 hover:text-red-800" title="Lihat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
