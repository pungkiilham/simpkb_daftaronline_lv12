{{-- @include('layouts.head')
</html> --}}
@include('layouts.admin')

@section('content')
<div class="p-1 md:p-3">
    <!-- Header -->
    <div class="mb-6 md:mb-8">
        <div class="flex items-center mb-2">
            <div class="p-1.5 md:p-2 bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg mr-2 md:mr-3">
                <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
            <h1 class="text-xl md:text-2xl font-bold text-gray-800">Dashboard</h1>
        </div>
        <p class="text-xs md:text-sm text-gray-600 ml-10 md:ml-14">Selamat datang di Sistem Informasi Manajemen Pengujian Kendaraan Bermotor</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
        <!-- Total Kendaraan -->
        <div class="bg-gradient-to-br from-indigo-500 via-blue-500 to-blue-600 rounded-xl shadow-lg p-4 md:p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <div class="p-1.5 md:p-2 bg-white/20 rounded-lg backdrop-blur-lg">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                </div>
                <span class="text-xs md:text-sm font-medium text-white/90">Total Kendaraan</span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold text-white">1,234</h3>
                </div>
            </div>
        </div>

        <!-- Kendaraan Lulus Uji -->
        <div class="bg-gradient-to-br from-emerald-400 via-emerald-500 to-teal-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-white/10 rounded-lg backdrop-blur-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-white/80">Lulus Uji</span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-3xl font-bold text-white">956</h3>
                </div>
            </div>
        </div>

        <!-- Kendaraan Dalam Proses -->
        <div class="bg-gradient-to-br from-amber-400 via-amber-500 to-orange-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-white/10 rounded-lg backdrop-blur-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-white/80">Dalam Proses</span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-3xl font-bold text-white">178</h3>
                </div>
            </div>
        </div>

        <!-- Kendaraan Tidak Lulus -->
        <div class="bg-gradient-to-br from-rose-400 via-rose-500 to-red-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-white/10 rounded-lg backdrop-blur-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-sm font-medium text-white/80">Tidak Lulus</span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-3xl font-bold text-white">100</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-xl transition-shadow">
        <div class="flex items-center justify-between mb-4 md:mb-6">
            <div class="flex items-center">
                <div class="p-1.5 md:p-2 bg-gradient-to-r from-indigo-100 to-blue-100 rounded-lg mr-2 md:mr-3">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-base md:text-lg font-semibold text-gray-800">Aktivitas Terbaru</h3>
            </div>
            <button class="px-3 py-1.5 md:px-4 md:py-2 text-xs md:text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition-colors">
                Lihat Semua
            </button>
        </div>
        <div class="overflow-x-auto -mx-4 md:-mx-6">
            <div class="inline-block min-w-full align-middle">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="px-4 md:px-6 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No. Kendaraan</th>
                            <th class="px-4 md:px-6 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pemilik</th>
                            <th class="px-4 md:px-6 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 md:px-6 py-2 md:py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm font-medium text-gray-900">N 1234 AB</td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-600">John Doe</td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                <span class="px-2 md:px-3 py-0.5 md:py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Lulus
                                </span>
                            </td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-xs md:text-sm text-gray-600">2023-12-01</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Statistics Chart
    var statisticsOptions = {
        chart: {
            type: 'line',
            height: 320,
            toolbar: { show: false }
        },
        series: [{
            name: 'Pengujian',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        },
        stroke: {
            curve: 'smooth'
        }
    };
    new ApexCharts(document.querySelector("#statisticsChart"), statisticsOptions).render();

    // Distribution Chart
    var distributionOptions = {
        chart: {
            type: 'donut',
            height: 320
        },
        series: [44, 55, 13, 33],
        labels: ['Lulus', 'Dalam Proses', 'Tidak Lulus', 'Pending'],
        colors: ['#10B981', '#F59E0B', '#EF4444', '#6B7280']
    };
    new ApexCharts(document.querySelector("#distributionChart"), distributionOptions).render();
</script>
@endpush
