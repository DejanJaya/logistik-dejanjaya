@extends('layout.main')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Barang Keluar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('barangkeluar.create') }}" class="btn btn-primary mb-3">Pencatatan Barang Keluar</a>
              <div class="card">
                <div class="card-header">
  
                  <div class="card-tools">
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No. Barang Keluar</th>
                        <th>Kode Barang</th>
                        <th>Quantity</th>
                        <th>Destination</th>
                        <th>Tanggal Keluar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->no_barang_keluar }}</td>
                                <td>{{ $d->kd_barang}}</td>
                                <td>{{ $d->quantity}}</td>
                                <td>{{ $d->destination}}</td>
                                <td>{{ $d->tanggal_keluar}}</td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection