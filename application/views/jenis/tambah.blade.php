@extends('template.layout-admin')
@section('judul','Entry Jenis Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
	<form method="POST" action="">
	<div class="form-group">
		<label for="jenis">Jenis</label>
		<input class="form-control" name="jenis" type="text" />
	</div>
		<button type="submit" class='btn btn-info'>Tambah Jenis Produk</button>
		</form>
	@endsection
