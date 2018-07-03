@extends('template.layout-karyawan')
@section('judul','Daftar Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<h2>Daftar Produk</h2>

		<table class="table table-hover">
			<tr>
				<th>nama produk</th>

				<th>jenis produk</th>
				<th>stok</th>
				<th>status produk</th>
				<th>harga</th>
				
				
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
			
		
		</tr>
		";
			
	}
	?>
	</table>
	@endsection
