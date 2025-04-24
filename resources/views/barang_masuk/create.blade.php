@extends('layout.main')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pencatatan Barang Masuk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pencatatan Barang Masuk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
            <form action="{{ route('barangmasuk.store') }}" method="POST">
                @csrf
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Form Barang Masuk</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                              <label for="">No Barang Masuk</label>
                              <input type="text" readonly class="form-control" id="" name="no_barang_masuk" value="{{ $kode }}" placeholder="">
                              @error('no_barang_masuk')
                              <small>{{ $message }}</small>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="">Tanggal Masuk</label>
                              <input type="date" class="form-control" id="" name="tanggal_masuk" placeholder="">
                              @error('tanggal_masuk')
                              <small>{{ $message }}</small>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="">Origin(Asal Tujuan)</label>
                              <input type="text" class="form-control" id="" name="origin" placeholder="">
                              @error('origin')
                              <small>{{ $message }}</small>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="">Barang</label>
                              <select name="kd_barang" id="kd_barang" class="form-control">
                                <option value="" selected disabled>Pilih Barang</option>
                                @foreach ($barang as $key => $b) 
                                  <option value="{{ $b->kd_barang }}">{{ $b->kd_barang." -> ".$b->nama_barang }}</option>
                                @endforeach
                              </select>
                              @error('kd_barang')
                              <small>{{ $message }}</small>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Stok</label>
                            <input type="text" readonly="readonly"  name="stok" id="stok" class="form-control">
                            @error('stok')
                            <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Quantity (jumlah masuk)</label>
                            <input type="number" name="quantity" id="quantity" class="form-control">
                            @error('quantity')
                            <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="">Total Stok</label>
                            <input type="text" readonly="readonly"  name="total"  id="total" class="form-control">
                            @error('total')
                            <small>{{ $message }}</small>
                            @enderror
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                 
                </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

  </div>
@endsection
@section('scripts')
<script>

$(document).on('change', '#kd_barang', function() {
  let barangId = $(this).val();

  $.ajax({
      url: '/get-stock/' + barangId,
      method: 'GET',
      success: function(response) {

          $('#stok').val(response.stock);
      },
      error: function(xhr) {
          console.log(xhr.responseText);
      }
  });
});

let stok = $('#stok');
let total = $('#total');

$(document).on('keyup', '#quantity', function() {
        let totalStok = parseInt(stok.val()) + parseInt(this.value);
        total.val(Number(totalStok));
        if(!this.value){
          total.val("");
        }
    });
</script>
@endsection