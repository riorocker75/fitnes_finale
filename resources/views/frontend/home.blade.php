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
              $data_paket=App\Models\Paket::orderBy('id','desc')->get();
          @endphp
          @foreach ($data_paket as $dp)
              
          <div class="col-lg-3 col-md-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$dp->nama}}</h5>
                    <p class="card-text">{!! $dp->deskripsi !!}</p>
                    <a href="#" class="btn btn-primary">Rp. {{number_format($dp->harga)}}</a>
                </div>
            </div>
              
              
          </div>
        @endforeach

      </div>

    </div>



</div>


</div>

@endsection