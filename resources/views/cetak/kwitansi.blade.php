<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
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
   
    <table border="1px">
		<tr>
			<td width="80px"><img src="" width="80px" /></td>
			<td>
				<table cellpadding="4">
					{{-- <tr>
						<td width="200px"><div class="lead">No kwitansi:</td>
						<td><div class="value"></div></td>
					</tr> --}}
                     @php
      
                    @endphp
					<tr>
						<td><div class="lead">Kartu Berobat</div></td>
						<td><div class="value-big">: {{jenis_kartu($dt->kartu_berobat)}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Keteragan</div></td>
						<td><div class="value-big">: {{$dt->diagnosa}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Tanggal</div></td>
						<td><div class="value-big">: {{format_tanggal(date('Y-m-d',strtotime($dt->tanggal)))}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Sebesar</div></td>
						<td><div class="value-big">: Rp.{{number_format($dt->uang_diterima)}} </div></td>
					</tr>
					{{-- <tr>
						<td><div class="lead">Uang Sejumlah:</div></td>
						<td><div class="value"> Tiga puluh ribu rupiah</div></td>
					</tr> --}}
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					{{-- <tr>
						<td><div class="lead">Petugas:</div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>____________________________________________________</td>
					</tr> --}}
					<tr>
						<td>&nbsp;</td>
						<td><div class="value"></div></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>


<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

</body>
</html>