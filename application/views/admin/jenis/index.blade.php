@extends('template.layout-admin')
@section('judul','Entry Jenis Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<h2>Daftar Jenis Produk</h2>
<a class="btn btn-info" href="{{ base_url() }}admin/jenisproduk/tambah">Tambah Data <span class='glyphicon glyphicon-plus'></span></a>
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
			<td><a class='btn btn-info' href='jenisproduk/edit/$a->id_jenis_produk'>Edit <span class='glyphicon glyphicon-pencil'></span></a>
			<a class='btn btn-danger' href='jenisproduk/hapus/$a->id_jenis_produk'>Hapus <span class='glyphicon glyphicon-trash'></span></a><?td>
		</tr>
		";
			
	}
	?>
	</table>
@endsection
