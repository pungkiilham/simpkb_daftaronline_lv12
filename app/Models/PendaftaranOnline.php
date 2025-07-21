<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranOnline extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public static function get_all($request, $date = null)
    {
        $data = PendaftaranOnline::where(['pendaftaran_onlines'])->orderBy('pendaftaran_onlines.created_at', 'desc');
        $data = $data->get();
        return $data;
    }

    protected $fillable = [
        'no_antrian_sementara',
        'no_antrian_akhir',
        'jenis_layanan',
        'nopol',
        'nouji',
        'nama',
        'ktp',
        'tanggal_layanan',
        'status_pendaftaran',
        'keterangan_ditolak',

        'surat_kuasa',
        'stnk',
        'srut',
        'fiskal',
        'kartu_uji',
        'surat_rekom_asal',
        'surat_permohonan',
        'surat_keterangan',
        'izin_trayek',
        'tera',
    ];
}
