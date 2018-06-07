@extends('template.layout-admin')
@section('judul','Entry User')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')	
	
	<form method="POST" action="">
	<div class="form-group">
		<label for="username">Username</label>
		<input class="form-control" name="username" type="text" />
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" name="password" type="password" />
	</div>
	<div class="form-group">
		<label for="nama">Nama</label>
		<input class="form-control" name="nama" />
	</div>
	<div class="form-group">
		<label for="jenis_user">Jenis User</label>
		<select class="form-control" name="jenis_user">
			<option value="Admin">Admin</option>
			<option value="Karyawan">Karyawan</option>
			<option value="Pimpinan">Pimpinan</option>
		</select>
	</div>
		<button type="submit" class='btn btn-info'>Tambah User</button>
		</form>
@endsection

