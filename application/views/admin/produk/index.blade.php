@extends('template.layout-admin')
@section('judul','Daftar Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<h2>Daftar Produk</h2>
<a class="btn btn-info" href="{{ base_url() }}admin/produk/tambah">Tambah Data</a>
		<table class="table table-hover">
			<tr>
				<th>nama produk</th>

				<th>jenis produk</th>
				<th>stok</th>
				<th>status produk</th>
				<th>harga</th>
				
				<th colspan = 2 > aksi</th>
			</tr>

        <?php
	foreach ($produk as $a ) {
		echo" 
		<tr>
			<td>$a->nama_produk</td>
			<td>$a->jenis</td>
			<td>$a->stok</td>";
        if($a->status_produk == 1) echo "<td>Aktif</td>";
        else echo "<td>Tidak Aktif</td>";
        echo "<td>Rp".number_format($a->harga,2,',','.')."</td>								
			<td><a class ='btn btn-info' href='produk/edit/$a->id_produk'>Edit</a>
			<a class ='btn btn-danger' href='produk/hapus/$a->id_produk'>Hapus</a></td>
		
		</tr>
		";
			
	}
	?>
	</table>
	@endsection
