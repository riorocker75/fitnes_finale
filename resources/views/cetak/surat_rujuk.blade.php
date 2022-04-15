<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Rujukan</title>

    {{-- databales --}}
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<style>
    .surat{
        	font-family: "Times New Roman", Times, serif !important;
	width: 21cm;
	min-height: 29.7cm;
	/* padding: 1cm 2cm; */
	padding: 0.48cm 2cm 1cm 2.5cm;
	margin: 1cm auto;
	border: 1px #d3d3d3 solid;
	border-radius: 5px;
	/* background: red; */
	position: relative;
	font-size: 12pt;
    }
    .kepala{
        text-align:center;
        font-size: 28px;
        margin:40px 120px;

    }
    .kop_surat {
	position: relative;
	height: 4cm;
	display: flex;
	top: 0;
}

.logo_surat {
	height: 0.5cm;
	width: 0.5cm;
    
}
.logo_surat img{
    margin-top: 40px;
  width: 90px;
    height: 75px;
}
.logo_kanan{
    position: absolute;
    left: 570px;
}
.logo_kanan img{
     margin-top: 40px;
    width: 90px;
    height: 75px;
}
.judul_surat {
	padding-top: 0.5cm;
	padding-left: 1cm;
	padding-right: 1cm;
	font-size: 20pt;
	font-weight: 700;
	text-align: center;
	width: 14.8cm;
	/* background: red; */
	margin: 0 auto;
	/* line-height: 1.3;s */
}


.line {
	margin-top: 5px;
	width: 100%;
	border-top: 4px solid #000;
}
.line2 {
	margin-top: 1.2px;
	width: 100%;
	border-top: 1px solid #000;
}

</style>
</head>

<body onload="windows:print();">

    @php
        $rekam= App\Models\Rekam::where('kode_rekam',$dt->id_rekam)->first();
        $pasien=App\Models\Pasien::where('id',$dt->id_pasien)->first();
        $d1=new DateTime();
        $d2=new DateTime(date('Y-m-d',strtotime($pasien->tanggal_lahir)));
        $cal = $d2->diff($d1);
        $umur =$cal->y;
    @endphp


       
    <div class="surat">

         <div class="kop_surat">
            <div class="logo_surat">
                <img src="{{url('/')}}/logo/logo.png" alt="" srcset="">
            </div>
                <div class="logo_kanan float-right">
                    <img src="{{url('/')}}/logo/puskesmas.png" alt="" srcset="">

                </div>

            <div class="judul_surat">
               <p style="font-size:20px">PEMERINTAH KABUPATEN ACEH TENGGARA</p> 
              <p style="line-height: 0;margin-top:16px">UPTD PUSKEMAS SUKA MAKMUR</p>
               <p style="margin-top:-10px"> KECAMATAN SEMADAM</p>
              
               <p style="font-size:12px;font-weight:400">Jln. Lawe Breingin Horas - Semadam Asal Kode Pos 24678</p>
            </div>
        </div>

            <div class="line" ></div>
        <div class="line2" ></div>
         <div class="kepala">
        Surat Rujukan
    </div>

    <table>
        <tbody>
                <tr>
                     <td>Nama </td>
                     <td>:&nbsp;{{$pasien->nama}}</td>
                 </tr>

                 
                <tr>

                     <td>Umur </td>
                     <td>:&nbsp;{{ $umur}} tahun</td>
                 </tr>

                 <tr>
                     <td>Pekerjaan </td>
                     <td>:&nbsp;{{$pasien->pekerjaan}}</td>
                 </tr>

                 <tr>
                     <td>Alamat </td>
                     <td>:&nbsp;{{$pasien->alamat}}</td>
                 </tr>

                 <tr>
                     <td>Rumah Sakit Tujuan </td>
                     <td>:&nbsp;{{$dt->rs_tujuan}}</td>
                 </tr>

                 <tr>
                     <td>Diagnosa</td>
                     <td>:&nbsp;{{$rekam->diagnosa}}</td>
                 </tr>

                  <tr>
                     <td>Tanggal Surat</td>
                     <td>:&nbsp;{{format_tanggal(date('Y-m-d',strtotime($dt->tgl_surat)))}}</td>
                 </tr>


        </tbody>

    </table>

    </div>
   





    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

</body>
</html>