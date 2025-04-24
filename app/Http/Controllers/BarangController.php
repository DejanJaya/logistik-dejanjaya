<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(){
        $data = new Barang;
        $data = $data->get();

        $barangmasuk = DB::table('barang_masuk')
        ->select('barang.nama_barang', 'barang_masuk.quantity', 'barang_masuk.origin', 'barang_masuk.tanggal_masuk')
        ->leftJoin('barang','barang_masuk.kd_barang','=','barang.kd_barang')
        ->orderBy('tanggal_masuk','desc')
        ->limit(5)
        ->get();

        $barangkeluar = DB::table('barang_keluar')
        ->select('barang.nama_barang', 'barang_keluar.quantity', 'barang_keluar.destination', 'barang_keluar.tanggal_keluar')
        ->leftJoin('barang','barang_keluar.kd_barang','=','barang.kd_barang')
        ->orderBy('tanggal_keluar','desc')
        ->limit(5)
        ->get();

        return view('barang.index', compact('data','barangmasuk','barangkeluar'));
    }
}
