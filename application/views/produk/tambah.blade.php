@extends('template.layout-admin')
@section('judul','Entry Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')	
	<form method="POST" action="">
	<div class="form-group">
		<label for="nama_produk">Nama Produk</label>
		<input class="form-control" name="nama_produk" type="text" />
	</div>
	<div class="form-group">	
		<label for="id_jenis_produk">Id Jenis Produk</label>
		<select class="form-control"  name="id_jenis_produk">
			<?php
		foreach($jenis_produk as $a){
			echo "<option value='$a->id_jenis_produk'>$a->jenis</option>";
			}
		?>
		</select>
	</div>
	<div class="form-group">
		<label for="stok">Stok</label>
		<input class=" form-control" name="stok" type="number" />
	</div>
	<div class="form-group">
		<label for="harga">Harga</label>
		<input class=" form-control" name="Harga" type="number" />
	</div>	
		<button type="submit" class='btn btn-info'>Tambah Produk</button>
		
		</form>
		@endsection
