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

class LaporanController extends Controller
{
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
        return view('pages.admin.laporan', compact([
            'pendaftaran',
            'day1',
            'day2',
            'day3',
            'day1_store',
            'day2_store',
            'day3_store',
        ]));
    }
}
