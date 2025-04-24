<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';

    public $timestamps = false;

    protected $fillable = [
        'no_barang_keluar',
        'kd_barang',
        'quantity',
        'destination',
        'tanggal_keluar',
    ];
}
