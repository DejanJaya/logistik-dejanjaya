<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){

        $data = Book::all();
        return view('book.index',compact('data'));
    }

    public function create(){
        return view('book.create');
    }

    public function store(Request $request){

        $book_baru =  new Book;
        $book_baru->nama_buku = $request->nama_buku;
        $book_baru->harga = $request->harga;
        $book_baru->save();

        return redirect()->route('book');
    }

    public function edit($kd_buku){
        $data = Book::find($kd_buku);
        return view('book.edit',compact('data'));
    }

    public function update(Request $request){
        $book_update = Book::find($request->kd_buku);
        // dd($book_update);
        $book_update->nama_buku = $request->nama_buku;
        $book_update->harga = $request->harga;
        $book_update->save();

        return redirect()->route('book');
    }

    public function delete($kd_buku){
        $book = Book::destroy($kd_buku);

        return redirect()->route('book');
    }
}
