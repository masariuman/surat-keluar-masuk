<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    //
    protected $table = 'masuk';

    protected $fillable = [
        'nomor_berkas',
        'alamat_pengirim',
        'tanggal',
        'nomor',
        'perihal',
        'nomor_petunjuk',
        'nomor_paket',
        'stats',
        'dokumen',
        'created_at',
        'updated_at'
    ];
}
