@include('layouts.head')


<body class="bg-gradient-to-br from-[#1a237e] to-[#283593]">
    <div class="min-h-screen flex items-center justify-center relative">

        <div class="max-w-md w-full bg-white rounded-lg shadow-2xl p-8 m-4">
            <div class="text-center mb-8">
                <img src="{{ asset('assets/logodishub.png') }}" alt="Logo" class="mx-auto h-16 w-auto mb-4">
                <h2 class="text-2xl font-bold text-[#1a237e] mb-10">DISHUB Kota Batu</h2>


                <h2 class="text-xl font-bold text-[#1a237e]">Pendaftaran Online</h2>
                <h2 class="text-3xl font-bold text-[#1a237e]">SIM PKB</h2>
                <p class="mt-1 text-gray-600">Sistem Informasi Manajemen PKB</p>
            </div>

            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukkan Username"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#1a237e] focus:border-[#1a237e]">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#1a237e] focus:border-[#1a237e]">
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 mb-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#1a237e] hover:bg-[#283593] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1a237e]">
                        Masuk
                    </button>
                    <a href="/"
                        class="w-full flex justify-center py-2 px-4 border border-[#1a237e] rounded-md shadow-sm text-sm font-medium text-[#1a237e] bg-white hover:bg-gray-50 hover:text-[#283593] transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1a237e]">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Copyright ©{{ date('Y') }} EstroHutama
                </p>
            </div>
        </div>
    </div>
</body>

</html>
