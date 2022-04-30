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
              <li class="breadcrumb-item active">Dashboard Member</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="container-fluid">
    <div class="row">

        @php
            $paket=App\Models\Paket::where('status',1)->orderBy('id','asc')->get()->take(8);
        @endphp

        @foreach ($paket as $dp)
            
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div style="margin-bottom:10px">
                        <h5 class="card-title">{{$dp->nama}}</h5>

                    </div>
                    <br>
                    <p class="card-text" >{!! $dp->deskripsi !!}</p>
                    
                    <h5>Rp. {{number_format($dp->harga)}}/ {{$dp->jangka_waktu}} bulan</h5>
                    <div class="float-right">

                        <a href="#" data-toggle="modal" data-target="#modal-paket-{{$dp->id}}" class="btn btn-block btn-outline-success">Pilih Paket</a>
                        
                      </div>
                      <a data-toggle="modal" data-target="#modal-detail{{$dp->id}}" class="btn btn-outline-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<div class="container-fluid">
    <div class="card">
           <div class="card-header">
             Riwayat Paket
            </div>  

<div class="card-body">
               <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Riwayat Tanggal</th>

                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @php
                            $id=Session::get('mb_id');
                            $cek_pengunjung=App\Models\Pengunjung::where('id',$id)->first();

                          $cek_trs= App\Models\Transaksi::where('id_member',$cek_pengunjung->id)->orderBy('id','desc')->get();
                      @endphp
                      @foreach ($cek_trs as $ct)
                        @php
                           
                        @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$ct->nama_paket}}</td>
                                <td>Rp.{{number_format($ct->harga)}}</td>
                                @if ($ct->status_member != 2)
                                     <td>   mulai: {{date('Y-m-d',strtotime($ct->tgl_awal))}} <br>
                                    akhir: {{date('Y-m-d',strtotime($ct->tgl_akhir))}}
                                    <br>
                                @else
                                     <td>............</td>
                                @endif
                               
                                </td>

                                <td>
                                  @if ($ct->status_member != 2)
                                      
                                      @php
                                        $now=date('Y-m-d');
                                        $lalu=date('Y-m-d', strtotime($ct->tgl_akhir))
                                    @endphp
                                    @if ($now >= $lalu)
                                    <label class="badge bg-warning">sudah selesai</label>
                                    @else
                                    <label class="badge bg-primary">sedang berjalan</label>
                                    @endif

                                 @else
                                    <label class="badge bg-warning">Sedang menunggu konfirmasi</label>
                                  @endif
                                 
                                </td>
                              
                            </tr>
                      @endforeach
                 
                  </tbody>
              
                </table>
             
            </div>

    </div>


</div>









</div>


@php
    $paket_modal=App\Models\Paket::get();
@endphp
<!-- Modal -->
@foreach ($paket_modal as $pm)
    
<div class="modal fade" id="modal-paket-{{$pm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Pembelian {{$pm->nama}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('/dashboard/member/beli')}}" method="post">
        @csrf
        <div class="modal-body">
            <h4>Apakah anda yakin ingin membeli <b>{{$pm->nama}}</b> ?</h4>
            <p>Jika, ya maka harap melakukan pembayaran senilai <b>Rp.{{number_format($pm->harga)}}</b></p>
            <p>melalui nomor rekening dibawah berikut</p>
            <br>

            <p>BRI : 456885452 an Tria</p>
            <p>DANA : 086456222 an Tria</p>
            <br>

            <p>Jika sudah selesai bayar, <b>harap tunjukan bukti pembayaran ke kasir kami</b>, jika anda datang ke tempat</p>
            <input type="hidden" name="id" value="{{$pm->id}}">
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Beli {{$pm->nama}}</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach



@php
    $paket_det=App\Models\Paket::get()
@endphp

@foreach ($paket_det as $item)

{{-- modal detail --}}
<div class="modal fade" id="modal-detail{{$item->id}}">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
<h4 class="modal-title">Detail {{$item->nama}} </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
  
     <div class="modal-body">
        {!! $item->deskripsi !!}

     </div>
 
</div>

</div>

</div>

@endforeach




@endsection