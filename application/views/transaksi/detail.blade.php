@extends('template.layout-karyawan')
@section('judul','Detail Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
	<form method="POST" action="">
	<div class="form-group">
		<label for="nama_pemesan">Nama Pemesan</label>
		<input class="form-control" name="nama_pemesan" type="text" value="<?=$detail->nama_pemesan?>" disabled />
	</div>
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
        </tr>
        <?php foreach($produk_beli as $p): ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$p->nama_produk?></td>
            <td><?="Rp ".number_format($p->harga,2,',','.')?></td>
            <td><?=$p->jumlah_beli?></td>
        </tr>
        <?php $harga += $p->harga * $p->jumlah_beli; ?>
        <?php $beli += $p->jumlah_beli; ?>
        <?php $no++; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan=2>Total bayar</td>
            <td><?="Rp ".number_format($harga,2,',','.')?></td>
            <td><?=$beli?></td>
        </tr>
    </table>
    <a class="btn btn-success" href="{{ base_url() }}karyawan/transaksi">Kembali</a>
@endsection
