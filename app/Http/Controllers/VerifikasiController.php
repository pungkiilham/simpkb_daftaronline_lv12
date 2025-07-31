<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\PendaftaranOnline;
use Brick\Math\BigInteger;
use Cron\DayOfWeekField;
use DateTime;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;
use Image;

class VerifikasiController extends Controller
{
    public function verifikasi_index(Request $request, $id)
    {
        $data = DB::table('pendaftaran_onlines')->find($id);
        $path = "url('image/";
        // dd($id, $data);

        if (DB::table('pendaftaran_onlines')->where([
            'id' => $id
        ])->exists()) {
            return view('pages.admin.verifikasi', compact([
                'data',
                'path',
            ]));
        } else {
            return redirect()->route('dashboard')->with('message', 'Data Tidak Ditemukan');
        }
    }


    public function verifikasi(Request $request, $id)
    {
        // 1. Ambil data pendaftaran yang akan diverifikasi
        $pendaftaran = PendaftaranOnline::find($id);

        if (!$pendaftaran) {
            return redirect()->route('dashboard')->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        // Ambil tanggal layanan dari data yang sudah ada di database
        // Ini penting karena tanggal layanan mungkin tidak dikirim melalui form
        $tanggalLayanan = $pendaftaran->tanggal_layanan;

        // 2. Definisikan aturan validasi
        $rules = [
            'status_pendaftaran' => 'required|in:0,1,2', // 0: Pilih Hasil, 1: Diterima, 2: Ditolak
            'no_antrian' => [
                'nullable', // Nomor antrian bisa kosong jika status ditolak
                'integer',
                'min:1',
            ],
            'keterangan_ditolak' => 'nullable|string|max:500',
        ];

        // Tambahkan aturan unik untuk no_antrian HANYA jika status_pendaftaran adalah 'Diterima' (1)
        if ($request->input('status_pendaftaran') == 1) {
            $rules['no_antrian'][] = 'required'; // no_antrian wajib jika diterima
            $rules['no_antrian'][] = 'unique:pendaftaran_onlines,no_antrian,' . $id . ',id,tanggal_layanan,' . $tanggalLayanan;
            // Penjelasan aturan unique:
            // unique:nama_tabel,nama_kolom_unik,id_yang_dikecualikan,nama_kolom_id_yang_dikecualikan,kolom_tambahan_1,nilai_kolom_tambahan_1
            // Ini berarti: no_antrian harus unik di tabel pendaftaran_onlines, kecuali untuk record dengan ID $id,
            // DAN juga unik berdasarkan tanggal_layanan yang sama.
        }

        // 3. Lakukan validasi
        $validator = Validator::make($request->all(), $rules, [
            'status_pendaftaran.required' => 'Status verifikasi pendaftaran wajib diisi.',
            'status_pendaftaran.in' => 'Pilihan status verifikasi tidak valid.',
            'no_antrian.required' => 'Nomor antrian wajib diisi jika pendaftaran diterima.',
            'no_antrian.integer' => 'Nomor antrian harus berupa angka.',
            'no_antrian.min' => 'Nomor antrian harus minimal 1.',
            'no_antrian.unique' => 'Nomor antrian ini sudah digunakan untuk tanggal layanan yang sama.',
            'keterangan_ditolak.string' => 'Keterangan ditolak harus berupa teks.',
            'keterangan_ditolak.max' => 'Keterangan ditolak tidak boleh lebih dari 500 karakter.',
        ]);

        // 4. Periksa apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput(); // Mengembalikan input yang sudah diisi
        }

        // 5. Lakukan update data dalam transaksi database
        // Menggunakan transaksi untuk memastikan operasi atomik
        DB::beginTransaction();
        try {
            if ($request->status_pendaftaran == 1) { // Diterima
                $pendaftaran->status_pendaftaran = $request->status_pendaftaran;
                $pendaftaran->no_antrian = $request->no_antrian;
                $pendaftaran->keterangan_ditolak = null; // Kosongkan keterangan ditolak jika diterima
            } else { // Ditolak (status_pendaftaran == 2 atau 0)
                $pendaftaran->status_pendaftaran = $request->status_pendaftaran;
                $pendaftaran->no_antrian = null; // Kosongkan no_antrian jika ditolak
                $pendaftaran->keterangan_ditolak = $request->keterangan_ditolak; // Perbaiki typo
            }

            $pendaftaran->save(); // Simpan perubahan ke database

            DB::commit(); // Commit transaksi jika berhasil

            return redirect()->route('dashboard')->with('success', 'Verifikasi berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi jika terjadi kesalahan
            // \Log::error('Gagal menyimpan verifikasi untuk ID ' . $id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan verifikasi. Silakan coba lagi.');
        }
    }

    public function verifikasi2(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status_pendaftaran' => 'required',
            'no_antrian',
            'keterangan_ditolak',
        ]);

        // dd($request, $id);

        // $antrian = DB::table('pendaftaran_onlines')->where($request->tanggal_layanan);

        // if (PendaftaranOnline::where('no_antrian', $request->no_antrian)->exists()) {
        if ($validator) {
            if ($request->status_pendaftaran == 1) {
                DB::table('pendaftaran_onlines')->where('id', $id)->update([
                    'status_pendaftaran' => $request->status_pendaftaran,
                    'no_antrian' => $request->no_antrian,
                    'keterangan_ditolak' => "",
                ]);
            } else {
                DB::table('pendaftaran_onlines')->where('id', $id)->update([
                    'status_pendaftaran' => $request->status_pendaftaran,
                    'no_antrian' => $request->no_antrian,
                    'keterangan_ditolak' => $request->keteragan_ditolak,
                ]);
            }
            return redirect()->route('dashboard')->with('message',  'Verifikasi berhasil');
            // return view('pages.admin.verifikasi', ['sukses' => $message]);
        } else {
            return view('pages.admin.verifikasi', ['message', 'Data tidak boleh kosong']);
        }
    }
}
