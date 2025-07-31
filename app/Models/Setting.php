<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'jml_max',
        'batas_pendaftaran',
    ];
}
