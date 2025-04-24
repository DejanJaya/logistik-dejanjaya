<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'kd_barang';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kd_barang',
        'nama_barang',
        'stok',
        'tgl_update',
    ];
}
