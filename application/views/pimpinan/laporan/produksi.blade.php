@extends('template.layout-pimpinan')
@section('judul','Daftar Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<center><h2>Laporan Produksi</h2></center>
<br/>
<a href="{{ base_url() }}pimpinan/laporan/cetak/produksi" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>



		<table class="table table-hover table-triped">
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Jumlah</th>
				<th>Waktu</th>
				
			</tr>

        <?php
		$no=1;
		
	foreach ($produksi as $a ) {
		echo" 
		<tr>
			<td>$no</td>
			<td>$a->nama_produk</td>
			<td>$a->jumlah</td>
			<td>$a->waktu</td>
			
		</tr>
		";
		
		$no++;
	}
	?>
		</table>
@endsection
