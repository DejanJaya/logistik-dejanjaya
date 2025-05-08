<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangKeluarController extends Controller
{
    public function index(){
        $data = new BarangKeluar;
        $data = $data->get();

        return view('barang_keluar.index', compact('data'));
    }

    public function getStockKeluar($kd_barang)
    {
        $barang = Barang::where('kd_barang', $kd_barang)->first(); 
        if ($barang) {
            return response()->json(['stock' => $barang->stok]); 
        }

        return response()->json(['stock' => 0]);
    }

    public function create(){
        $csql = DB::table('barang_keluar')
        ->select(DB::raw("max(no_barang_keluar) as no"))
        ->get();
        $nomor = $csql[0]->no;
        $no = substr($nomor, -3, 3);
        $nourut = (int)$no + 1;
        $kode =  "T-BK-" .date('ymd'). sprintf("%05s", $nourut);

        // $book = Book::all();
        // dd($book);

        $barang = Barang::all();

        return view('barang_keluar.create', compact('barang','kode'));
    }

    public function store(Request $request){
        $validator =  Validator::make($request->all(),[
            'tanggal_keluar'      => 'required',
            'destination'    => 'required',
            'kd_barang' => 'required',
            'stok' => 'required',
            'quantity' => 'required',
            'total' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no_barang_keluar']      = $request->no_barang_keluar;
        $data['kd_barang']    = $request->kd_barang;
        $data['quantity']    = $request->quantity;
        $data['destination']    = $request->destination;
        $data['tanggal_keluar']    = $request->tanggal_keluar;

        BarangKeluar::create($data);

        $barang = Barang::where('kd_barang', $request->kd_barang)->first();


            // Update barang data
            $barang->stok = $request->total;
            $barang->tgl_update = $request->tanggal_keluar;
            
            $barang->save();

        return redirect()->route('barangkeluar');
    }
}
