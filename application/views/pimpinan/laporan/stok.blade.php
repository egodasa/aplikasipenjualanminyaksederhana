@extends('template.layout-pimpinan')
@section('judul','Daftar Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<center><h2>Laporan Stok Produk</h2></center>
<br/>
<a href="{{ base_url() }}pimpinan/laporan/cetak/stok" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>



		<table class="table table-hover table-triped">
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Stok</th>
				
			</tr>

        <?php
		$no=1;
		
	foreach ($produk as $a ) {
		echo" 
		<tr>
			<td>$no</td>
			<td>$a->nama_produk</td>
			<td>$a->stok</td>
			
		</tr>
		";
		
		$no++;
	}
	?>
		</table>
@endsection
