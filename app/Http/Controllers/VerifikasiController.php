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
