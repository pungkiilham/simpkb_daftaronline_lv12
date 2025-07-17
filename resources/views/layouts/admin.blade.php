@include('layouts.head')

<body class="bg-[#FAFAFA]">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 bg-[#181947] w-[280px] md:w-64 transform transition-transform duration-300 ease-in-out z-50 -translate-x-full lg:translate-x-0">
            <div class="flex flex-col h-full">
                <!-- Logo/Brand -->
                <div class="flex items-center justify-between px-4 py-4">
                    <div class="p-2 flex justify-start items-center">
                        <div class="flex justify-center items-center mb-2 mr-3">
                            <img src="{{ asset('assets/logodishub.png') }}" class="h-10 w-auto" alt="Logo Dishub">
                        </div>
                        <div>
                            <h1 class="text-white text-base font-bold">SIM PKB</h1>
                            <h1 class="text-white text-sm font-bold">Kota Batu</h1>
                            <p class="text-xs text-white opacity-70">Versi 2.1</p>
                        </div>
                    </div>
                    <!-- Close button for mobile -->
                    <button class="text-white hover:text-gray-200 lg:hidden p-2" onclick="toggleSidebar()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-4 overflow-y-auto">
                    @include('layouts.sidebar')
                </nav>

                <!-- Version Info -->
                {{-- <div class="justify-center items-center px-4 py-4">
                    <p class="text-xs text-center text-white opacity-70">Versi 2.1</p>
                </div> --}}
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"
            onclick="toggleSidebar()"></div>

        <!-- Main Content -->
        <div class="flex-1 transition-all duration-300 ease-in-out" id="mainContent">
            <!-- Header -->
            <header class="bg-white sticky top-0 z-30 border-b">
                <div class="flex items-center justify-between px-4 py-3 md:px-6 md:py-4">
                    <div class="flex items-center gap-3 md:gap-4">
                        <!-- Hamburger menu for mobile -->
                        <button class="text-gray-600 hover:text-gray-900 p-1 lg:hidden" onclick="toggleSidebar()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <!-- Toggle button for large screens -->
                        <button class="hidden lg:block text-gray-600 hover:text-gray-900 p-1"
                            onclick="toggleSidebarLarge()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div class="relative w-48 md:w-64">
                            <input type="text" placeholder="Search..."
                                class="w-full pl-10 pr-4 py-1.5 md:py-2 text-sm rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            <svg class="absolute left-3 top-2 h-4 w-4 md:h-5 md:w-5 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <!-- Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <div class="flex items-center">
                                <button @click="open = !open" class="flex items-center space-x-2 p-1">
                                    {{-- <div class="flex-shrink-0 p-1 ring-2 rounded-xl"> --}}
                                    <div class="flex-shrink-0">
                                        <svg class="h-6 w-auto md:h-8 text-gray-600" fill="currentColor"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                          </svg>
                                    </div>
                                </button>

                                {{-- <div class="px-2">
                                    <p class="text-md font-medium">User Name</p>
                                    <p class="text-sm opacity-70">User Role</p>
                                </div> --}}
                            </div>
                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-50">
                                <div class="px-4 py-2">
                                    <p class="text-md font-medium">User Name</p>
                                    <p class="text-sm opacity-70">User Role</p>
                                </div>

                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Settings
                                    </div>
                                </a>

                                <div class="border-t border-gray-100"></div>

                                <form method="POST" action="#">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <div class="flex items-center text-red-600">
                                            <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Logout
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-1 md:p-2">
                <div class="max-w-full mx-auto">
                    <div class="bg-white rounded-xl shadow-sm">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        let sidebarCollapsed = false;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (window.innerWidth < 1024) { // mobile view
                if (sidebar.classList.contains('-translate-x-full')) {
                    // Open sidebar
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                } else {
                    // Close sidebar
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            }
        }

        function toggleSidebarLarge() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            sidebarCollapsed = !sidebarCollapsed;

            if (sidebarCollapsed) {
                // Collapse sidebar
                sidebar.style.transform = 'translateX(-256px)';
                mainContent.style.marginLeft = '0';
            } else {
                // Expand sidebar
                sidebar.style.transform = 'translateX(0)';
                mainContent.style.marginLeft = '16rem';
            }
        }

        function initializeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');

            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
                mainContent.style.marginLeft = '0';
            } else {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
                if (!sidebarCollapsed) {
                    mainContent.style.marginLeft = '16rem';
                }
            }
        }

        // Run on page load
        initializeSidebar();

        // Run on window resize
        window.addEventListener('resize', initializeSidebar);
    </script>
</body>

</html>
