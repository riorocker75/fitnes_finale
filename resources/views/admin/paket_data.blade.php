@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Paket Fitness</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Paket Fitness</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
      
     
              {{-- {{$cek->prosedur}} --}}
        
      <div class="container-fluid">
          <div class="row">

            <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Paket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <form action="{{ url('/dashboard/paket/act') }}" method="post">
                       @csrf  
                       @method('POST')
                     <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" class="form-control" name="nama" required>
                    </div>

                     <div class="form-group">
                            <label>Jangka Waktu</label>
                            <input type="number" class="form-control" name="jangka" required>
                            <span style="color:red">* jangka waktu dalam satuan bulan</span>
                    </div>

                     <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="harga" required>
                    </div>

                     <div class="form-group">
                            <label>Deskripsi</label>
                           <textarea name="deksripsi" id="summernote" cols="30" rows="30"></textarea>
                    </div>


                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data semua paket </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Jangka Waktu</th>
                    <th>Harga</th>
                    <th>Pilihan</th>


                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $dt)
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->nama}}</td>
                                <td>{{$dt->jangka_waktu}} Bulan</td>
                                <td>Rp. {{number_format($dt->harga)}}</td>
                                <td>
                                    <a href="{{url('/dashboard/paket/edit/'.$dt->id.'')}}" >Ubah</a>
                                    <a href="{{url('/dashboard/paket/delete/'.$dt->id.'')}}" >Hapus</a>

                                </td>
                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
         
      </section>   

</div>  


@endsection