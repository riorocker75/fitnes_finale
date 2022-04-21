@extends('layouts.main_app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>  
    
    <section class="content">
        <div class="container-fluid">
            <div class="card">
            <div class="card-header">
           Semua Transaksi
            <div class="float-right">
                  <a href="{{url('/dashboard/member/cetak/transaksi')}}" class="btn  btn-default"><i class="fa fa-print" aria-hidden="true"></i> Cetak Data</a>
                </div>
            </div>
           
            <div class="card-body">
               <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    {{-- <th>Pilihan</th> --}}

                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $da)
                        @php
                            $paket=App\Models\Paket::where('id',$da->id_paket)->first();
                        @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$da->nama_paket}}</td>
                                <td>Rp.{{number_format($da->harga)}}</td>
                                <td>{{format_tanggal(date('Y-m-d', strtotime($da->tgl_awal)))}}</td>
                              
                               
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