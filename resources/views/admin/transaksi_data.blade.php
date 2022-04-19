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
                  <a href="{{url('/dashboard/cetak/transaksi')}}" class="btn  btn-default"><i class="fa fa-print" aria-hidden="true"></i> Cetak Data</a>
                </div>
            </div>
           
            <div class="card-body">
               <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>Pilihan</th>

                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $da)
                        @php
                            $cek_pengunjung=App\Models\Pengunjung::where('id',$da->id_member)->first();
                            $paket=App\Models\Paket::where('id',$da->id_paket)->first();
                        @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$cek_pengunjung->nik}}</td>
                                <td>{{$cek_pengunjung->nama}}</td>

                                <td>{{$da->nama_paket}}</td>
                                <td>Rp.{{number_format($da->harga)}}</td>
                                <td>
                                <a href="{{url('/dashboard/transaksi/delete/'.$da->id.'')}}" class="btn btn-danger">Hapus</a>
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

 <script>
                                    $(document).ready(function (e) {
   
                                        $('.konfirmasi').click(function () {
                                            var id_konfirmasi = $(this).data('id');
                                            var nama = $(this).data('nama');
                                            var harga = $(this).data('harga');


                                            var konfirmasi_alert = confirm(`apakah benar ${nama} sudah melakukan pembayaran senilai Rp.${harga} ? `); 
                                            
                                            if(konfirmasi_alert == true){
                                                    $.ajax({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        },
                                                    type:"post",
                                                    url:"/ajax/konfirmasi",
                                                    data:{id:id_konfirmasi,"_token": "{{ csrf_token() }}"},
                                                    success: function(data){          
                                                        window.location.reload();
                                                    }
                                                    });

                                            }
                                        
                                        });
                                        });
                                </script>
@endsection