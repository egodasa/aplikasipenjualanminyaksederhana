@extends('template.layout-admin')
@section('judul','Entry Produk')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')	
	<form method="POST" action="">
	<div class="form-group">
		<label for="nama_produk">Nama Produk</label>
		<input class="form-control" name="nama_produk" type="text" value="<?=$detail->nama_produk?>" />
	</div>
	<div class="form-group">	
		<label for="id_jenis_produk">Jenis Produk</label>
		<select class="form-control"  name="id_jenis_produk" value="<?=$detail->id_jenis_produk?>">
			<?php
		foreach($jenis_produk as $a){
			echo "<option value='$a->id_jenis_produk'>$a->jenis</option>";
			}
		?>
		</select>
	</div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="stok">Stok Sekarang</label>
                <input class=" form-control" name="stok_lama" type="number" value="<?=$detail->stok?>" readonly />
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="stok">Tambah Stok</label>
                <input class="form-control" placeholder="Banyak stok masuk..." name="stok" type="number" />
            </div>
        </div>
    </div>
	
	<div class="form-group">
		<label for="harga">Harga</label>
		<input class=" form-control" name="harga" type="number"  value="<?=$detail->harga?>"/>
	</div>	
		<button type="submit" class='btn btn-info'>Edit Produk</button>
		
		</form>
@endsection
