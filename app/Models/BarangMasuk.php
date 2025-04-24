<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    public $timestamps = false;

    protected $fillable = [
        'no_barang_masuk',
        'kd_barang',
        'quantity',
        'origin',
        'tanggal_masuk',
    ];
}
