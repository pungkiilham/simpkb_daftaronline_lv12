<?php

namespace Database\Seeders;

use App\Models\PendaftaranOnline;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'admin',
            'password' => '123',
            'role' => '0',
        ]);

        DB::table('pendaftaran_onlines')->insert([
            'id' => 1,
            'no_antrian_sementara' => '1',
            'no_antrian_akhir'=> '2',
            'jenis_layanan' => '1',
            'nopol' => 'N1234NN',
            'nouji' => '123456',
            'nama' => 'hendra',
            'ktp' => '12345678',
            // 'tanggal_layanan' => date(now()->format('d m Y')),
            'tanggal_layanan' => date(now()),
            // 'status_pendaftaran',
            // 'keterangan_ditolak',

            // 'surat_kuasa',
            // 'stnk',
            // 'srut',
            // 'fiskal',
            // 'kartu_uji',
            // 'surat_rekom_asal',
            // 'surat_permohonan',
            // 'surat_keterangan',
            // 'izin_trayek',
            // 'tera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pendaftaran_onlines')->insert([
            'id' => 2,
            'no_antrian_sementara' => '1',
            'no_antrian_akhir'=> '2',
            'jenis_layanan' => '1',
            'nopol' => 'N1234NN',
            'nouji' => '123456',
            'nama' => 'hendra',
            'ktp' => '12345678',
            // 'tanggal_layanan' => date(now()->format('d m Y')),
            'tanggal_layanan' => date(now()),
            // 'status_pendaftaran',
            // 'keterangan_ditolak',

            // 'surat_kuasa',
            // 'stnk',
            // 'srut',
            // 'fiskal',
            // 'kartu_uji',
            // 'surat_rekom_asal',
            // 'surat_permohonan',
            // 'surat_keterangan',
            // 'izin_trayek',
            // 'tera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('pendaftaran_onlines')->insert([
            'id' => 3,
            'no_antrian_sementara' => '1',
            'no_antrian_akhir'=> '2',
            'jenis_layanan' => '1',
            'nopol' => 'N1234NN',
            'nouji' => '123456',
            'nama' => 'hendra',
            'ktp' => '12345678',
            // 'tanggal_layanan' => date(now()->format('d m Y')),
            'tanggal_layanan' => date(now()),
            // 'status_pendaftaran',
            // 'keterangan_ditolak',

            // 'surat_kuasa',
            // 'stnk',
            // 'srut',
            // 'fiskal',
            // 'kartu_uji',
            // 'surat_rekom_asal',
            // 'surat_permohonan',
            // 'surat_keterangan',
            // 'izin_trayek',
            // 'tera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
