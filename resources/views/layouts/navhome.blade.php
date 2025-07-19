<nav class="bg-[#1a237e] shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <a href="/" class="flex items-center">
                <div class="flex-shrink-0">
                    <img src="{{ asset('assets/logodishub.png') }}" alt="Dishub Logo" class="h-10 w-auto">
                </div>
                <span class="ml-3 text-white font-semibold text-lg">DISHUB KOTA BATU</span>
            </a>
            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-4 py-2 border border-white text-sm font-medium rounded-md text-white hover:bg-white hover:text-[#1a237e] transition duration-150 ease-in-out">
                    Masuk
                </a>
            </div>
        </div>
    </div>
</nav>