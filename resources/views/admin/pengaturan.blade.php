@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengaturan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengaturan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
        
      <div class="container-fluid">
          <div class="row">

            <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <form action="{{ url('/dashboard/pengaturan/update') }}" method="post">
                       @csrf  
                       @method('POST')
                    <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password">
                     <span style="color:red">* Kosongkan jika tidak ingin mengubah password</span>   
                  </div>

                  <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            
         
      </section>   

</div>  


@endsection