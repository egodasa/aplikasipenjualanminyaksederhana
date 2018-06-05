@extends('template.layout-karyawan')
@section('judul','Entry Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
	<form method="POST" action="">
	<div class="form-group">
		<label for="nama_pemesan">Nama Pemesan</label>
		<input class="form-control" name="nama_pemesan" type="text" value="<?=$_SESSION['nama_pemesan']?>"/>
	</div>
	<div class="form-group">
		<label for="nama_produk">Nama Produk</label>
		<select class="form-control" name="id_produk">
        <?php foreach($produk as $a): ?>
        <?="<option value='$a->id_produk'>$a->nama_produk, stok $a->stok</option>"?>
        <?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label for="jumlah_beli">Jumlah</label>
		<input class="form-control" name="jumlah_beli" type="number" />
	</div>
		<button type="submit" class='btn btn-info'>Tambah produk</button>
		<a href="reset" class='btn btn-danger'>Batalkan transaksi</a>
		</form>
    <?php
    $no = 1;
    $harga = 0;
    $beli = 0;
    ?>
    <h2>Produk yang dibeli</h2>
    <table class="table table-border">
        <tr>
            <th>No</th>
            <th>Nama produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($produk_beli as $p): ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$p->nama_produk?></td>
            <td><?="Rp ".number_format($p->harga,2,',','.')?></td>
            <td><?=$p->jumlah_beli?></td>
            <td>
                <form method="POST" action="hapus">
                <input type="hidden" name="id_tmp" value="<?=$p->id_tmp?>">
                <input type="hidden" name="id_produk" value="<?=$p->id_produk?>">
                <input type="hidden" name="jumlah_beli" value="<?=$p->jumlah_beli?>">
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        <?php $harga += $p->harga * $p->jumlah_beli; ?>
        <?php $beli += $p->jumlah_beli; ?>
        <?php $no++; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan=3>Total bayar</td>
            <td><?="Rp ".number_format($harga,2,',','.')?></td>
            <td><?=$beli?></td>
        </tr>
    </table>
    <a class="btn btn-success" href="simpan">Simpan transaksi</a>
@endsection
