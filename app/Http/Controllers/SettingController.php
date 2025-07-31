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

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = 1;
        $user = DB::table('users')->get();
        $jml_max = DB::table('setting_pendaftarans')->where('id', $id)->pluck('jml_max');
        $jml_max = (int) $jml_max[0];

        // dd($user);

        return view('pages.admin.pengaturan', compact([
            'user',
            'jml_max',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jml_max' => 'required'
        ]);
        // dd($request);

        $id = 1;
        if ($validator) {
            // DB::table('setting_pendaftarans')->where('id', $id)->pluck('jml_max')->update([
            //     'jml_max' => $request->jml_max
            // ]);
            // return view('pages.admin.pengaturan')->with('success', 'Update data jumlah maksimal pendaftaran berhasil');

            $updated = DB::table('setting_pendaftarans')
                ->where('id', $id)
                ->update([
                    'jml_max' => $request->jml_max,
                    'updated_at' => now(), // Manually update timestamp if not using Eloquent
                ]);

            if ($updated) {
                DB::commit(); // Commit the transaction if update was successful
                return redirect()->back()->with('success', 'Jumlah maksimal pendaftaran berhasil diperbarui.');
            } else {
                DB::rollBack(); // Rollback if no rows were affected (e.g., ID not found)
                return redirect()->back()->with('error', 'Gagal memperbarui jumlah maksimal pendaftaran. Data tidak ditemukan atau tidak ada perubahan.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
