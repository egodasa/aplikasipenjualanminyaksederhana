@extends('template.layout-admin')
@section('judul','Daftar User')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<h2>Daftar User</h2>
<a class="btn btn-info" href="{{ base_url() }}admin/users/tambah">Tambah Data</a>
		<table class="table table-hover">
			<tr>
				<th>username</th>
				<th>nama</th>
				<th>jenis user</th>
				<th>status user</th>
				<th>aksi</th>
			</tr>
        <?php
	foreach ($nama as $a ) {
		echo" 
		<tr>
			<td>$a->username</td>
			<td>$a->nama</td>
			<td>$a->jenis_user</td>";
        if($a->status_user == 1) echo "<td>Aktif</td>";
        else echo "<td>Tidak Aktif</td>";
        echo "<td><a class='btn btn-info' href='edit/$a->id'>Edit</a>
			<a class='btn btn-danger' href='users/hapus/$a->id'>Hapus</a></td>
		</tr>
		";
			
	}
	?>
	</table>
@endsection
