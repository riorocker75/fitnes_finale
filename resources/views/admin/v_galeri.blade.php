@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->


    </div>  
    
    <section class="content">
  
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Galeri</h3>
                <div class="float-right">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
         <div class="row">
<div class="col-sm-2">
<a href="{{url('/logo/gal1.png')}}" data-toggle="lightbox" data-title="Galeri Kegiatan" data-gallery="gallery">
<img src="{{url('/logo/gal1.png')}}" class="img-fluid mb-2" alt="white sample" />
</a>
</div>
<div class="col-sm-2">
<a href="{{url('/logo/gal2.png')}}" data-toggle="lightbox" data-title="Galeri Kegiatan" data-gallery="gallery">
<img src="{{url('/logo/gal2.png')}}" class="img-fluid mb-2" alt="black sample" />
</a>
</div>
<div class="col-sm-2">
<a href="{{url('/logo/gal3.png')}}" data-toggle="lightbox" data-title="Galeri Kegiatan" data-gallery="gallery">
<img src="{{url('/logo/gal3.png')}}" class="img-fluid mb-2" alt="red sample" />
</a>
</div>
<div class="col-sm-2">
<a href="{{url('/logo/gal4.png')}}" data-toggle="lightbox" data-title="Galeri Kegiatan" data-gallery="gallery">
<img src="{{url('/logo/gal4.png')}}" class="img-fluid mb-2" alt="red sample" />
</a>
</div>

</div>
</div>
              </div>
              <!-- /.card-body -->
      </section>   
</div>  




@endsection