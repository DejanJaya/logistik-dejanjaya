@extends('layout.main')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang Masuk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Barang Masuk</li>
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
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary mb-3">Pencatatan Barang Masuk</a>
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
                        <th>No. Barang Masuk</th>
                        <th>Kode Barang</th>
                        <th>Quantity</th>
                        <th>Origin</th>
                        <th>Tanggal Masuk</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->no_barang_masuk }}</td>
                                <td>{{ $d->kd_barang}}</td>
                                <td>{{ $d->quantity}}</td>
                                <td>{{ $d->origin}}</td>
                                <td>{{ $d->tanggal_masuk}}</td>
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