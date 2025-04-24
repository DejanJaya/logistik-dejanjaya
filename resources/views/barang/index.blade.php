@extends('layout.main')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Barang</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Stok Barang</li>
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
                
              <div class="card">
                <div class="card-header">
                  <h3>Daftar Stok Barang</h3>
                  <div class="card-tools">
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Tanggal Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->kd_barang}}</td>
                                <td>{{ $d->nama_barang}}</td>
                                <td>{{ $d->stok}}</td>
                                <td>{{ $d->tgl_update}}</td>
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
          <div class="row">
            <div class="col-6">
                
              <div class="card">
                <div class="card-header">
                  <h5>5 Transaksi Terakhir Barang Masuk</h5>
                  <div class="card-tools">
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Origin</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangmasuk as $bm)
                            <tr>
                                <td>{{ $bm->tanggal_masuk}}</td>
                                <td>{{ $bm->nama_barang}}</td>
                                <td>{{ $bm->quantity}}</td>
                                <td>{{ $bm->origin}}</td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-6">
                
              <div class="card">
                <div class="card-header">
                  <h5>5 Transaksi Terakhir Barang Keluar</h5>
                  <div class="card-tools">
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Destination</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangkeluar as $bk)
                            <tr>
                                <td>{{ $bk->tanggal_keluar}}</td>
                                <td>{{ $bk->nama_barang}}</td>
                                <td>{{ $bk->quantity}}</td>
                                <td>{{ $bk->destination}}</td>
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