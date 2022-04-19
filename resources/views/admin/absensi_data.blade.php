@extends('layouts.main_app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Absensi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Absensi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>  
    
    <section class="content">
        <div class="container-fluid">
            <div class="card">
            <div class="card-header">
             Absensi
              <div class="float-right">
                  <a href="{{url('/dashboard/cetak/absensi')}}" class="btn  btn-default"><i class="fa fa-print" aria-hidden="true"></i> Cetak Data</a>
                </div>
            </div>
            @php
                $now=date('Y-m-d');
                $data_absensi=App\Models\Absensi::where('tanggal',$now)->get();
            @endphp
            <div class="card-body">
               <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jam masuk</th>
                    <th>Jam Keluar</th>
                    <th>Status</th>


                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data_absensi as $da)
                        @php
                            $cek_pengunjung=App\Models\Pengunjung::where('id',$da->id_pengunjung)->first();
                        @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$cek_pengunjung->nik}}</td>
                                <td>{{$cek_pengunjung->nama}} </td>
                                <td>{{$da->jam_masuk}} </td>
                                <td>{{$da->jam_keluar}}</td>
                                <td>{{role_pengunjung($cek_pengunjung->lvl)}} </td>


                                <td>
                                    {{-- <a href="{{url('/dashboard/absensi/edit/'.$da->id.'')}}" class="btn btn-warning">Ubah</a> --}}
                                <a href="{{url('/dashboard/absensi/delete/'.$da->id.'')}}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                      @endforeach
                 
                  </tbody>
              
                </table>
             
            </div>
         </div>

            
        </div>

    </section>
    
    
 </div>   


@endsection