<div class="container">


<nav class="navbar navbar-expand-lg navbar-light bg-light" id="scroll-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fitness</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('/')}}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#paket">Paket</a>
        </li>

          <li class="nav-item">
                <a class="nav-link" href="#tentang">Tentang</a>
           </li>

        <li class="nav-item">
          <a class="nav-link" href="#kontak">Kontak</a>
        </li>

      
      
       
      </ul>
      <div class="flex">

          <div style="position: relative;right:0;left:510px">
            <a data-toggle="modal" data-target="#modal-daftar" class="nav-link">Daftar / Login</a>
        </div>
    </div>
     
    </div>
  </div>
</nav>
</div>

{{-- modal daftar --}}
<div class="modal fade" id="modal-daftar">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
<h4 class="modal-title">Daftar </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{url('/daftar/act')}}" method="post">
    @csrf  
    @method('POST')
     <div class="modal-body">

        <div class="form-group">
            <label for="">Nama</label>
            <input type='text' class="form-control" name="nama" required/>
        </div>

          <div class="form-group">
            <label for="">NIK</label>
            <input type='text' class="form-control" name="nik" required/>
        </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select class="custom-select form-control-border border-width-2"  name="kelamin" required="required">
                    <option value="1">Pria</option>
                    <option value="2">Wanita</option>
            </select>
        </div>

        <div class="divider"></div>

        <div class="form-group">
            <label for="">Username</label>
            <input type='text' class="form-control" name="username" required/>
        </div>

          <div class="form-group">
            <label for="">Password</label>
            <input type='password' class="form-control" name="password" required/>
        </div>
        <span>Jika sudah memiliki Akun silahkan <a href="{{url('/login')}}">Login</a></span>

                 

  </div>
  <div class="modal-footer justify-content-between">
    <button type="submit" class="btn btn-primary">Daftar</button>
  </div>
</form>
</div>

</div>

</div>

{{-- modal login --}}
