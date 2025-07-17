<x-app-layout>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white py-3">
                            <h2 class="card-title fs-4 fw-bold text-center mb-0">Formulir Pendaftaran Uji Kendaraan</h2>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf

                                <div class="mb-4">
                                    <label for="layanan" class="form-label fw-bold">Jenis Layanan <span class="text-danger">*</span></label>
                                    <select class="form-select @error('layanan') is-invalid @enderror" id="layanan" name="layanan" required>
                                        <option value="" selected disabled>Pilih Jenis Layanan...</option>
                                        <option value="daftar_baru" {{ old('layanan') == 'daftar_baru' ? 'selected' : '' }}>Daftar Baru</option>
                                        <option value="perpanjang" {{ old('layanan') == 'perpanjang' ? 'selected' : '' }}>Perpanjang</option>
                                        <option value="numpang_uji_masuk" {{ old('layanan') == 'numpang_uji_masuk' ? 'selected' : '' }}>Numpang Uji Masuk</option>
                                        <option value="numpang_uji_keluar" {{ old('layanan') == 'numpang_uji_keluar' ? 'selected' : '' }}>Numpang Uji Keluar</option>
                                        <option value="mutasi_masuk" {{ old('layanan') == 'mutasi_masuk' ? 'selected' : '' }}>Mutasi Masuk</option>
                                        <option value="mutasi_keluar" {{ old('layanan') == 'mutasi_keluar' ? 'selected' : '' }}>Mutasi Keluar</option>
                                        <option value="perubahan" {{ old('layanan') == 'perubahan' ? 'selected' : '' }}>Perubahan</option>
                                        <option value="lainnya" {{ old('layanan') == 'lainnya' ? 'selected' : '' }}>Lainnya (Rusak/Hilang)</option>
                                    </select>
                                    @error('layanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="nomor_kendaraan" class="form-label fw-bold">Nomor Kendaraan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nomor_kendaraan') is-invalid @enderror" id="nomor_kendaraan" name="nomor_kendaraan" value="{{ old('nomor_kendaraan') }}" placeholder="Contoh: AG 1234 XX" required>
                                        @error('nomor_kendaraan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="nama_pemilik" class="form-label fw-bold">Nama Pemilik <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}" placeholder="Masukkan nama pemilik kendaraan" required>
                                        @error('nama_pemilik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="nomor_telepon" class="form-label fw-bold">Nomor Telepon <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Contoh: 08123456789" required>
                                        @error('nomor_telepon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4" id="dokumenContainer">
                                    <h5 class="fw-bold mb-3">Dokumen Persyaratan</h5>
                                    <div class="alert alert-info small">
                                        <i class="bi bi-info-circle-fill me-2"></i>
                                        Format file yang diperbolehkan: PDF, JPG, JPEG, PNG (Maks. 2MB per file)
                                    </div>

                                    @php
                                        $defaultDokumen = [
                                            ['id' => 'identitas', 'label' => 'Scan Identitas Pemohon'],
                                            ['id' => 'stnk', 'label' => 'Scan STNK'],
                                        ];
                                    @endphp

                                    <div class="row">
                                        @foreach($defaultDokumen as $dok)
                                            <div class="col-md-6 mb-3">
                                                <label for="{{ $dok['id'] }}" class="form-label">{{ $dok['label'] }} <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control @error($dok['id']) is-invalid @enderror" id="{{ $dok['id'] }}" name="{{ $dok['id'] }}" accept=".pdf,.jpg,.jpeg,.png" required>
                                                @error($dok['id'])
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="jadwal_uji" class="form-label fw-bold">Pilih Jadwal Uji <span class="text-danger">*</span></label>
                                    <select class="form-select @error('jadwal_uji') is-invalid @enderror" id="jadwal_uji" name="jadwal_uji" required>
                                        <option value="" selected disabled>Pilih Jadwal...</option>
                                    </select>
                                    @error('jadwal_uji')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-column flex-sm-row gap-2 justify-content-end mt-4">
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left me-1"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-1"></i> Daftar Sekarang
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const layananSelect = document.querySelector('select[name="layanan"]');
            const dokumenContainer = document.getElementById('dokumenContainer');
            const jadwalSelect = document.querySelector('select[name="jadwal_uji"]');

            // Update dokumen persyaratan based on layanan
            layananSelect.addEventListener('change', function() {
                // Add specific document requirements based on selected service
                // This will be handled by the backend
            });

            // Populate available schedules
            function updateJadwal() {
                const next5Days = getNext5Days();
                jadwalSelect.innerHTML = '<option value="">Pilih Jadwal...</option>';
                next5Days.forEach(date => {
                    const option = document.createElement('option');
                    option.value = date.value;
                    option.textContent = `${date.hari}, ${date.tanggal} (${date.availableSlots} slot tersedia)`;
                    if (date.availableSlots === 0) {
                        option.disabled = true;
                    }
                    jadwalSelect.appendChild(option);
                });
            }

            function getNext5Days() {
                const dates = [];
                const totalSlots = 15;

                for (let i = 1; i <= 5; i++) {
                    const date = new Date();
                    date.setDate(date.getDate() + i);
                    if (date.getDay() !== 0 && date.getDay() !== 6) {
                        const availableSlots = Math.floor(Math.random() * 10) + 1;
                        dates.push({
                            value: date.toISOString().split('T')[0],
                            hari: new Intl.DateTimeFormat('id-ID', { weekday: 'long' }).format(date),
                            tanggal: new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(date),
                            availableSlots: availableSlots,
                            totalSlots: totalSlots,
                        });
                    }
                }
                return dates;
            }

            updateJadwal();

            // Form validation
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
    @endpush
</x-app-layout>
