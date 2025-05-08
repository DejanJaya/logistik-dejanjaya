<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'kd_buku';
    // protected $keyType = 'string';

    protected $fillable = [
        'nama_buku',
        'harga',
    ];
}
