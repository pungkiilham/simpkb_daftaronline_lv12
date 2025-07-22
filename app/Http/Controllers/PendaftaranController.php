<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\PendaftaranOnline;
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
        // $pendaftaran = PendaftaranOnline::get_all($request, date("Y-m-d"));

        // return view('pages.admin.dashboard', compact('pendaftaran'));
        $pendaftaran = PendaftaranOnline::all();
        return view('pages.admin.dashboard', compact('pendaftaran'));
    }

    public function baru(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            // 'ktp' => 'required',
            // 'nopol' => 'required',
            // 'nouji' => 'required',

            'surat_kuasa' => 'mimes:jpg,jpeg,png|max:2048',
            'stnk' => 'mimes:jpg,jpeg,png|max:2048',
            'srut' => 'mimes:jpg,jpeg,png|max:2048',
            'izin_trayek' => 'mimes:jpg,jpeg,png|max:2048',
            'tera' => 'mimes:jpg,jpeg,png|max:2048',
        ]);




        if ($validator) {
            $path1 = "";
            $path2 = "";
            $path3 = "";
            $path4 = "";
            $path5 = "";
            // $ready = 0;

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

            // if ($request->hasFile('surat_kuasa')) {
            //     $file1 = $request->file('surat_kuasa');
            //     $path1 = $file1->store('uploads', 'public');
            //     $ready = $ready++;
            // }
            // if ($request->hasFile('stnk')) {
            //     $file2 = $request->file('stnk');
            //     $path2 = $file2->store('uploads', 'public');
            //     $ready = $ready++;
            // }
            // if ($request->hasFile('srut')) {
            //     $file3 = $request->file('srut');
            //     $path3 = $file3->store('uploads', 'public');
            //     $ready = $ready++;
            // }
            // if ($request->hasFile('izin_trayek')) {
            //     $file4 = $request->file('izin_trayek');
            //     $path4 = $file4->store('uploads', 'public');
            //     $ready = $ready++;
            // }
            // if ($request->hasFile('tera')) {
            //     $file5 = $request->file('tera');
            //     $path5 = $file5->store('uploads', 'public');
            //     $ready = $ready++;
            // }


            DB::table('pendaftaran_onlines')->insert([
                'id' => Str::uuid(),
                'nama' => $request->nama,
                'ktp' => $request->ktp,
                'telpon' => $request->telpon,
                'nopol' => $request->nopol,
                'nouji' => $request->nouji,
                'jenis_layanan' => '1',

                'surat_kuasa' => $path1,
                'stnk' => $path2,
                'srut' => $path3,
                'izin_trayek' => $path4,
                'tera' => $path5,


                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
            // dd($ready);

        }


        if ($validator->fails()) {
            return redirect()->route('baru')->with('message', 'Terjadi kesalahan')->withErrors($validator)
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
