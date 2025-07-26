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
                'data', 'path',
            ]));
        }
        else{
            return redirect()->route('dashboard')->with('message', 'Data Tidak Ditemukan');
        }
    }
    public function verifikasi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status_pendaftaran' => 'required',
            'no_antrian',
            'keterangan_ditolak',
            'tanggal_layanan',
        ]);

        $antrian = DB::table('pendaftaran_onlines')->where($request->tanggal_layanan);

        if ($validator) {
            DB::table('pendaftaran_onlines')->insert([
            'status_pendaftaran' => $request->status_pendaftaran,
            ]);
        }

    }

}
