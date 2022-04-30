@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data pengunjung</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data pengunjung</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data semua pengunjung</h3>
                

                <div class="float-right">
                  <a href="{{url('/dashboard/pengunjung/add')}}" class="btn btn-primary">Tambah data</a>
                  <a href="{{url('/dashboard/cetak/pengunjung')}}" class="btn  btn-default"><i class="fa fa-print" aria-hidden="true"></i> Cetak Data</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    {{-- <th>NIK</th> --}}
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>

                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $dt)
                           <tr>
                                <td>{{$no++}}</td>
                                {{-- <td>{{$dt->nik}}</td> --}}
                                <td>{{$dt->nama}} </td>
                                <td>{{$dt->no_hp}} </td>
                                <td>{{$dt->alamat}}</td>
                                <td>
                                    <a href="{{url('/dashboard/pengunjung/edit/'.$dt->id.'')}}" class="btn btn-warning">Ubah</a>
                                <a href="{{url('/dashboard/pengunjung/delete/'.$dt->id.'')}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>
              <!-- /.card-body -->
      </section>   

</div>  


@endsection