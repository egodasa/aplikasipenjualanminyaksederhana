@extends('template.layout-admin')
@section('judul','Edit Jenis Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')	
	<form method="POST" action="">
	<div class="form-group">
		<label for="jenis">Jenis</label>
		<input class="form-control" name="jenis" type="text" value="<?=$detail->jenis?>" />
	</div>
	<button type="submit" class='btn btn-info'>Edit Jenis</button>
		
		</form>
@endsection
