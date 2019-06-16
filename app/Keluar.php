<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    //
    protected $table = 'keluar';

    protected $fillable = [
        'nomor_berkas',
        'alamat_penerima',
        'tanggal',
        'perihal',
        'nomor_petunjuk',
        'nomor',
        'stats',
        'dokumen',
        'created_at',
        'updated_at'
    ];
}
