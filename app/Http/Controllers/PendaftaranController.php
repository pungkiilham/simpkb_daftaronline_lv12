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

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dayformat untuk
        $day1 = $day2 = $day3 = "";
        $day1_store = $day2_store = $day3_store = "";
        if (Carbon::now()->addDays(2)->isSaturday()) {
            $more_day = 2;
            $day1 = Carbon::now()->addDays(2 + $more_day)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2 + $more_day)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(3)->isSaturday()) {
            $more_day = 2;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(4)->isSaturday()) {
            $more_day = 2;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        }

        if (Carbon::now()->addDays(2)->isSunday()) {
            $more_day = 1;
            $day1 = Carbon::now()->addDays(2 + $more_day)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2 + $more_day)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(3)->isSunday()) {
            $more_day = 1;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(4)->isSunday()) {
            $more_day = 1;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } else {
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4)->translatedFormat('Y-m-d');
        }

        $pendaftaran = DB::table('pendaftaran_onlines')->get();
        // $pendaftaran = PendaftaranOnline::all();
        // $pendaftaran = PendaftaranOnline::all()->where('tanggal_layanan','>=', 'now');
        // $pendaftaran = PendaftaranOnline::all()->where('tanggal_layanan', '>=', '2025-07-23');
        // $pendaftaran = $pendaftaran->oldest();
        return view('pages.admin.dashboard', compact([
            'pendaftaran',
            'day1',
            'day2',
            'day3',
            'day1_store',
            'day2_store',
            'day3_store',
        ]));
    }

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

    public function baru_index(Request $request)
    {
        //dayformat untuk
        $day1 = $day2 = $day3 = "";
        $day1_store = $day2_store = $day3_store = "";
        if (Carbon::now()->addDays(2)->isSaturday()) {
            $more_day = 2;
            $day1 = Carbon::now()->addDays(2 + $more_day)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2 + $more_day)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(3)->isSaturday()) {
            $more_day = 2;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(4)->isSaturday()) {
            $more_day = 2;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        }

        if (Carbon::now()->addDays(2)->isSunday()) {
            $more_day = 1;
            $day1 = Carbon::now()->addDays(2 + $more_day)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2 + $more_day)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(3)->isSunday()) {
            $more_day = 1;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3 + $more_day)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3 + $more_day)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } elseif (Carbon::now()->addDays(4)->isSunday()) {
            $more_day = 1;
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4 + $more_day)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4 + $more_day)->translatedFormat('Y-m-d');
        } else {
            $day1 = Carbon::now()->addDays(2)->translatedFormat('d M Y');
            $day2 = Carbon::now()->addDays(3)->translatedFormat('d M Y');
            $day3 = Carbon::now()->addDays(4)->translatedFormat('d M Y');

            $day1_store = Carbon::now()->addDays(2)->translatedFormat('Y-m-d');
            $day2_store = Carbon::now()->addDays(3)->translatedFormat('Y-m-d');
            $day3_store = Carbon::now()->addDays(4)->translatedFormat('Y-m-d');
        }

        $num_qued1 = DB::table('pendaftaran_onlines')->where('tanggal_layanan', $day1_store)->count();
        $num_qued2 = DB::table('pendaftaran_onlines')->where('tanggal_layanan', $day2_store)->count();
        $num_qued3 = DB::table('pendaftaran_onlines')->where('tanggal_layanan', $day3_store)->count();

        $id = 1;
        $que_max = DB::table('setting_pendaftarans')->where('id', $id)->pluck('jml_max');;
        $que_max = (int) $que_max[0];

        $sisa1 = $que_max - $num_qued1;
        $sisa2 = $que_max - $num_qued2;
        $sisa3 = $que_max - $num_qued3;

        // dd($num_qued1, $num_qued2, $num_qued3, $sisa1, $sisa2, $sisa3);

        return view('pages.formdaftar.baru', compact([
            'day1',
            'day2',
            'day3',
            'day1_store',
            'day2_store',
            'day3_store',
            'sisa1',
            'sisa2',
            'sisa3'
        ]));
    }

    public function baru(Request $request)
    {
        $day_now = Carbon::now();
        $day1 = Carbon::now()->addDays(1);
        $day2 = Carbon::now()->addDays(2);
        $day3 = Carbon::now()->addDays(3);

        // $num_qued1 = DB::table('pendaftaran_onlines')->where('tanggal_layanan', $day1)->count();
        // $num_qued2 = DB::table('pendaftaran_onlines')->where('tanggal_layanan', $day2)->count();
        // $num_qued3 = DB::table('pendaftaran_onlines')->where('tanggal_layanan', $day3)->count();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'ktp' => 'required',
            'nopol' => 'required',
            'nouji' => 'required',
            'tanggal_layanan' => 'required',

            'surat_kuasa' => 'mimes:jpg,jpeg,png|max:2048',
            'stnk' => 'required|mimes:jpg,jpeg,png|max:2048',
            'srut' => 'required|mimes:jpg,jpeg,png|max:2048',
            'izin_trayek' => 'mimes:jpg,jpeg,png|max:2048',
            'tera' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator) {
            $path1 = "";
            $path2 = "";
            $path3 = "";
            $path4 = "";
            $path5 = "";

            // dd($request->all(), $request->files->all());

            $file1 = $request->file('surat_kuasa');
            if ($request->hasFile('surat_kuasa'))
                $path1 = $file1->store('uploads', 'public');

            $file2 = $request->file('stnk');
            if ($request->hasFile('stnk'))
                $path2 = $file2->store('uploads', 'public');

            $file3 = $request->file('srut');
            if ($request->hasFile('srut'))
                $path3 = $file3->store('uploads', 'public');

            $file4 = $request->file('izin_trayek');
            if ($request->hasFile('izin_trayek'))
                $path4 = $file4->store('uploads', 'public');

            $file5 = $request->file('tera');
            if ($request->hasFile('tera'))
                $path5 = $file5->store('uploads', 'public');


            DB::table('pendaftaran_onlines')->insert([
                'id' => Str::uuid(),
                'nama' => $request->nama,
                'ktp' => $request->ktp,
                'telpon' => $request->telpon,
                'nopol' => $request->nopol,
                'nouji' => $request->nouji,
                'jenis_layanan' => '1',
                'tanggal_layanan' => $request->tanggal_layanan,

                'surat_kuasa' => $path1,
                'stnk' => $path2,
                'srut' => $path3,
                'izin_trayek' => $path4,
                'tera' => $path5,


                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }


        if ($validator->fails()) {
            return redirect()->route('baru.index')->with('message', 'Terjadi kesalahan')->withErrors($validator)
                ->withInput($request->all());
        } else {
            return redirect()->route('home2')->with('message', 'Daftar UJI BARU Berhasil, Silahkan Cek Secara Berkala');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('pages.formdaftar.baru');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
