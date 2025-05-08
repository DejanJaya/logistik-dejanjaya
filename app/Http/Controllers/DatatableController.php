<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DatatableController extends Controller
{
    public function serverside(Request $request)
    {

        if ($request->ajax()) {

            $data = new User;
            $data = $data->latest();

            return DataTables::of($data)
                ->addColumn('no', function ($data) {
                    return $data->id;
                })
                ->addColumn('photo', function ($data) {
                    return '<img src="' . asset('storage/photo-user/' . $data->image) . '" width="100" alt="">';
                })
                ->addColumn('nama', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('admin.user.edit', ['id' => $data->id]) . '" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                <a data-toggle="modal" data-target="#modal-hapus' . $data->id . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>';
                })
                ->rawColumns(['photo', 'action'])
                ->make(true);
        }
        return view('datatable.serverside', compact('request'));
    }
}
