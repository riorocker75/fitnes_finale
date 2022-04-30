<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pengunjung</title>
{{-- databales --}}
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



    <style type="text/css">
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}

			/* @page { size: with x height */
			/*@page { size: 20cm 10cm; margin: 0px; }*/
			@page {
				size: A4;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			/*body { border: 2px solid #000000;  }*/
	</style>
</head>
<body onload="window.print();">
	<div class="wrapper">
		<div class="container">


   <div style="text-align:center">
        <h3> Laporan Tahunan Pengunjung Gym </h3>
			<h3>Tahun : {{date('Y')}}</h3>
   </div>
   <table id="absensi" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>NIK</th> --}}
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
			   <?php $no=1; ?>
			@foreach ($data as $dt)
			   
            <tr>
					
                <td>{{$no++}}</td>
				  {{-- <td>{{$dt->nik}}</td> --}}
                <td>{{$dt->nama}} </td>
                <td>{{$dt->no_hp}} </td>
                <td>{{$dt->alamat}}</td>
				<td>{{format_tanggal(date('Y-m-d',strtotime($dt->tanggal)))}} <br>
				 </td>
			
				<td>{{role_pengunjung($dt->lvl)}} </td>
            </tr>  
			@endforeach
        </tbody>   
	</table>

		</div>
	</div>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
$('#absensi').dataTable({
	searching: false, paging: false, info: false
});
</script>    
</body>
</html>