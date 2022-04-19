@extends('layouts.front_app')
@section('content')



<div class="container">

{{-- carousel  --}}

<div style="margin:30px 0;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{url('/logo/cr2.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{url('/logo/cr1.png')}}" class="d-block w-100" alt="...">
        </div>
    
    </div>
    </div>
</div>
{{-- testing scrollskyp --}}
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
  <div class="paket" id="paket">
      <div class="paket-header">
          <h4> Paket Pilihan</h4>
      </div>

      <div class="row">
          @php
              $data_paket=App\Models\Paket::orderBy('id','asc')->take(8)->get();
          @endphp
          @foreach ($data_paket as $dp)
              
          <div class="col-lg-3 col-md-6">

            <div class="card">
                <div class="card-body">
                    <div style="margin-bottom:10px">
                        <h5 class="card-title">{{$dp->nama}}</h5>

                    </div>
                    <br>
                    <p class="card-text" >{!! Str::words($dp->deskripsi,30,'....') !!}</p>
                    
                    <h5>Rp. {{number_format($dp->harga)}}/ {{$dp->jangka_waktu}} bulan</h5>
                    <div class="float-right">

                        <a <?php if(!Session::get('login-mb')){?> data-toggle="modal" data-target="#modal-daftar" <?php } ?> class="btn btn-block btn-outline-success">Pilih Paket</a>
                    </div>
                        <a data-toggle="modal" data-target="#modal-detail{{$dp->id}}" class="btn btn-outline-primary">Detail</a>

                </div>
            </div>
              
              
          </div>
        @endforeach

      </div>

    </div>

    <div class="paket" id="tentang">
      <div class="paket-header">
          <h4> Tentang Kami</h4>
      </div>
      <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body"> 
                    <p>Gym yang berlokasikan di Jl. Kapten Muslim No. 76, Dwi Kora, Kec. Medan Helvetia Kota Medan, Sumatera Utara 20118</p>
                        <p> ini didirikan oleh Teuku Musliadi pada tahun 2018. Gym ini buka setiap hari.</p> 
                        <p> <b>Jam buka gym</b>:</p>
                   <p> Senin – Jum’at		: 07.00 – 22.00 WIB</p>
                   <p> Sabtu			: 07.00 – 19.00 WIB</p>
                    <p>Minggu		        : 07.00 – 12.00 WIB</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="583" height="382" id="gmap_canvas" src="https://maps.google.com/maps?q=Jl.%20Kapten%20Muslim%20No.%2076,%20Dwi%20Kora,%20Kec.%20Medan%20Helvetia%20Kota%20Medan,%20Sumatera%20Utara%2020118&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org">putlocker</a><br><style>.mapouter{position:relative;text-align:right;height:280px;width:500px;}</style><a href="https://www.embedgooglemap.net">google iframe</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:382px;width:583px;}</style></div></div>
            </div>

      </div>


    </div>


    <div class="paket" id="kontak">
      <div class="paket-header">
          <h4> Kontak Kami</h4>
      </div>
      <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body"> 
                        <div style="text-align:center">
                            Hubungi Kami di : 0823-6783-8977
                        </div>
                    </div>
                </div>
            </div>
           

      </div>


    </div>



</div>


</div>

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