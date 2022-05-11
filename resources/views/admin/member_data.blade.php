@extends('layouts.main_app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data member Fitness</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data member Fitness</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    </div>  
    
    <section class="content">
      
     
              {{-- {{$cek->prosedur}} --}}
        
      <div class="container-fluid">
          <div class="row">

            <div class="col-lg-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <form action="{{ url('/dashboard/member/act') }}" method="post">
                       @csrf  
                       @method('POST')
                <div class="form-group">
                            <label>Pengunjung</label>
                            <select class="form-control select2" style="width: 100%;" name="member" required>
                                <option selected value="">Cari Nama Pengunjung</option>
                                @php
                                    $pengunjung= \App\Models\Pengunjung::get();
                                @endphp
                                @foreach ($pengunjung as $pg)
                                    <option value="{{$pg->id}}">{{$pg->nama}} {{$pg->nik}}</option>
                                @endforeach
                            </select>
                    </div>

                     <div class="form-group">
                           <label>Paket</label>
                            <select class="form-control select2" style="width: 100%;" name="paket" required>
                                <option selected value="">Pilih Paket</option>
                                @php
                                    $paket= \App\Models\Paket::get();
                                @endphp
                                @foreach ($paket as $pk)
                                    <option value="{{$pk->id}}">{{$pk->nama}} || {{$pk->jangka_waktu}} bulan || <b>Rp.{{number_format($pk->harga)}}</b> </option>
                                @endforeach
                            </select>
                    </div>


                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="col-lg-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data semua member </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode member</th>
                    <th>Nama Paket</th>
                    <th>Masa Aktif</th>
                    <th>Pilihan</th>


                  </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach ($data as $dt)

                      @php
                      $pengunjung=App\Models\Pengunjung::where('id',$dt->id_pengunjung)->first();
                        $transaksi=App\Models\Transaksi::where('kode_transaksi',$dt->kode_transaksi)->first();
                        $paket= App\Models\Paket::where('id',$transaksi->id_paket)->first();    
                      @endphp
                           <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->kode_member}}
                                  {{-- <p>{{$pengunjung->nama}}</p> --}}
                                  <p>{{$pengunjung->nik}}</p>
                                </td>

                                <td>{{$paket->nama}}</td>
                                <td>
                                    mulai: {{date('Y-m-d',strtotime($transaksi->tgl_awal))}} <br>
                                    akhir: {{date('Y-m-d',strtotime($transaksi->tgl_akhir))}}
                                    <br>

                                    @php
                                        $now=date('Y-m-d');
                                        $lalu=date('Y-m-d', strtotime($transaksi->tgl_akhir))
                                    @endphp
                                    @if ($now >= $lalu)
                                    <label class="badge bg-warning">sudah selesai</label>
                                    @else
                                    <label class="badge bg-primary">sedang berjalan</label>
                                    @endif
                                </td>
                                <td>
                                    {{-- <a href="{{url('/dashboard/member/edit/'.$dt->id.'')}}" >Ubah</a> --}}
                                    <a href="{{url('/dashboard/member/delete/'.$dt->id.'')}}" >Hapus</a>

                                </td>
                            </tr>
                      @endforeach
                 
                 
                  </tbody>
              
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
         
      </section>   

</div>  


@endsection