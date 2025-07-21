<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\PendaftaranOnline;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        // $request->validate([
        $validator = Validator::make($request->all(), [
            'surat_kuasa' => 'mimes:jpg,jpeg,png,pdf|max:2048',
            'stnk' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'srut' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'izin_trayek' => 'mimes:jpg,jpeg,png,pdf|max:2048',
            'tera' => 'mimes:jpg,jpeg,png,pdf|max:2048',

            'nama' => 'required',
            'ktp' => 'required',
            'nopol' => 'required',
            'nouji' => 'required',
        ]);

        $file1 = $request->file('surat_kuasa');
        $path1 = $file1->store('uploads', 'public');

        $file2 = $request->file('stnk');
        $path2 = $file2->store('uploads', 'public');

        $file3 = $request->file('srut');
        $path3 = $file3->store('uploads', 'public');

        $file4 = $request->file('izin_trayek');
        $path4 = $file4->store('uploads', 'public');

        $file5 = $request->file('tera');
        $path5 = $file5->store('uploads', 'public');

// try()
        DB::table('pendaftaran_onlines')->insert([
            'id' => Str::uuid(),
            'nama' => $request->nama,
            'ktp' => $request->ktp,
            'telpon' => $request->telpon,
            'nopol' => $request->nopol,
            'nouji' => $request->nouji,
            'nouji' => $request->nouji,
            'jenis_layanan' => '1',

            'surat_kuasa' => $path1,
            'stnk' => $path2,
            'srut' => $path3,
            'izin_trayek' => $path4,
            'tera' => $path5,


            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),

            // 'stnk' => $request->nama,
        ]);

        if ($validator->fails()) {
            return $validator->withInput($request->all());
        } else {
            return redirect()->route('home2')->with('message_success', 'Anda berhasil mendaftar untuk layanan UJI BARU');
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
