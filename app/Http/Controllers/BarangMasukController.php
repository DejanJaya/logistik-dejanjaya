<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangMasukController extends Controller
{
    public function index(){
        $data = new BarangMasuk;
        $data = $data->get();

        return view('barang_masuk.index', compact('data'));
    }

    public function getStock($kd_barang)
    {
        $barang = Barang::where('kd_barang', $kd_barang)->first(); 
        if ($barang) {
            return response()->json(['stock' => $barang->stok]); 
        }

        return response()->json(['stock' => 0]);
    }

    public function create(){
        $csql = DB::table('barang_masuk')
        ->select(DB::raw("max(no_barang_masuk) as no"))
        ->get();
        $nomor = $csql[0]->no;
        $no = substr($nomor, -3, 3);
        $nourut = (int)$no + 1;
        $kode =  "T-BM-" .date('ymd'). sprintf("%05s", $nourut);

        $barang = Barang::all();
        // dd($barang);

        return view('barang_masuk.create', compact('barang','kode'));
    }

    public function store(Request $request){
        $validator =  Validator::make($request->all(),[
            'tanggal_masuk'      => 'required',
            'origin'    => 'required',
            'kd_barang' => 'required',
            'stok' => 'required',
            'quantity' => 'required',
            'total' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no_barang_masuk']      = $request->no_barang_masuk;
        $data['kd_barang']    = $request->kd_barang;
        $data['quantity']    = $request->quantity;
        $data['origin']    = $request->origin;
        $data['tanggal_masuk']    = $request->tanggal_masuk;

        BarangMasuk::create($data);

        $barang = Barang::where('kd_barang', $request->kd_barang)->first();


            // Update barang data
            $barang->stok = $request->total;
            $barang->tgl_update = $request->tanggal_masuk;
            
            $barang->save();

        return redirect()->route('barangmasuk');
    }

}
