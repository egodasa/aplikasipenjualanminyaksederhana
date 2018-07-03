@extends('template.layout-karyawan')
@section('judul','Daftar Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
		<table class="table table-hover">
			<tr>
				<th>id transaksi</th>
				<th>nama pemesan</th>
				<th>tanggal pembelian</th>
				
				<th>aksi</th>
			</tr>

        <?php
	foreach ($transaksi as $a ) {
		echo" 
		<tr>
			<td>$a->id_transaksi</td>
			<td>$a->nama_pemesan</td>
			<td>$a->tgl_pembelian</td>						
			<td><a class ='btn btn-primary' href='transaksi/detail/$a->id_transaksi'>Detail <span class='glyphicon glyphicon-folder-open'></span></a>
            <a class ='btn btn-success' target='_blank' href='transaksi/faktur/$a->id_transaksi'>Faktur <span class='glyphicon glyphicon-print'></span></a></td>
		</tr>
		";
			
	}
	?>
@endsection
