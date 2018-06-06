@extends('template.layout-admin')
@section('judul','Entry Jenis Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<h2>Daftar Jenis Produk</h2>
<a class="btn btn-info" href="{{ base_url() }}admin/jenisproduk/tambah">Tambah Data</a>
		<table class="table table-hover">
			<tr>
				<th>jenis</th>
				
				<th >aksi</th>
			</tr>

        <?php
	foreach ($jenis as $a ) {
		echo" 
		<tr>
			<td>$a->jenis</td>
			<td><a class='btn btn-info' href='jenisproduk/edit/$a->id_jenis_produk'>Edit</a>
			<a class='btn btn-danger' href='jenisproduk/hapus/$a->id_jenis_produk'>Hapus</a><?td>
		</tr>
		";
			
	}
	?>
	</table>
@endsection
