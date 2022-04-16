@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
        @php
            $jlh_paket= App\Models\Paket::where('status',1)->count();
            $jlh_unjung= App\Models\Pengunjung::where('lvl',1)->count();  
            $jlh_member= App\Models\Pengunjung::where('lvl',2)->count();

        @endphp
      <div class="container-fluid">
         <div class="row">
                <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$jlh_paket}}</h3>

                            <p>Paket</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <a href="{{url('/dashboard/paket/data')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                 </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$jlh_unjung}}</h3>

                            <p>Pengunjung</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <a href="{{url('/dashboard/pengunjung/data')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$jlh_member}}</h3>

                            <p>Member</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <a href="{{url('/dashboard/member/data')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
         </div>

         <div class="card">
            <div class="card-header">
             Absensi
             <div class="float-right">
               <a data-toggle="modal" data-target="#modal-absensi" class="btn btn-primary">Tambah absensi</a>
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
                                    <a href="{{url('/dashboard/absensi/edit/'.$da->id.'')}}" class="btn btn-warning">Ubah</a>
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

{{-- modal --}}
<div class="modal fade" id="modal-absensi">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
<h4 class="modal-title">Input Absensi Pengunjung/Member</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{url('/dashboard/absensi/act')}}" method="post">
    @csrf  
    @method('POST')
     <div class="modal-body">
               <div class="form-group">
                      <label>Pengunjung</label>
                      <select class="form-control select2" style="width: 100%;" name="cek_member" id="cek_member" required>
                          <option selected value="">Cari Nik Pengunjung</option>
                          @php
                              $pengunjung= \App\Models\Pengunjung::get();
                          @endphp
                          @foreach ($pengunjung as $pg)
                              <option value="{{$pg->id}}">{{$pg->nama}} {{$pg->nik}}</option>
                          @endforeach
                      </select>
                    </div>

                  <div class="form-group">
                      <label for="">Jam Masuk</label>
                    <div class='input-group date' id='absensi-pick'>
                      @php
                          $nowTime=date('HH:mm');
                      @endphp
                        <input type='time' class="form-control" value="{{$nowTime}}" name="jam_masuk"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="">Jam keluar</label>

                    <div class='input-group date' id='absensi-pick'>
                        <input type='time' class="form-control" name="jam_keluar"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                  </div>

                  {{-- bayar bagian pengunjung harian --}}
                    <div id="tampil_status"> </div>
                             {{-- cek bayar atau tidak script --}}
                                <script>
                                    $(document).ready(function () {
   
                                        $('#cek_member').change(function () {
                                            var cek_member =$('#cek_member').children("option:selected").val(); 
                                                if(cek_member.length > 0){ 

                                                    $.ajax({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        },
                                                    type:"post",
                                                    url:"/ajax/cek_member",
                                                    data:{cek_member:cek_member},
                                                    success: function(data){          
                                                        $('#tampil_status').html(data);
                                                    }
                                                    });
                                                }
                                        
                                        });
                                        });
                                </script>







  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>
</div>

</div>

</div>


@endsection