@extends('template.layout-pimpinan')
@section('judul','Daftar Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<center><h2>Laporan Penjualan Harian</h2></center>
<br/>
<form method="GET" action="">
<div class="row">
	<div class="col-xs-2">
		<label>Pilih hari</label>
	</div>
	<div class="col-xs-4">
		<select name="hari" placeholder="pilih hari" class="form-control">
		<?php foreach($daftar_hari as $hari): ?>
			<?php if($_GET['hari']):  ?>
				<?php if($_GET['hari'] == date('d')):  ?>
					<option value="<?=$hari->hari?>" selected><?=$hari->hari?></option>
				<?php else: ?>
					<option value="<?=$hari->hari?>"><?=$hari->hari?></option>
				<?php endif; ?>
			<?php else: ?>
				<?php if($hari->hari == date('d')):  ?>
					<option value="<?=$hari->hari?>" selected><?=$hari->hari?></option>
				<?php else: ?>
					<option value="<?=$hari->hari?>"><?=$hari->hari?></option>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		</select>
	</div>
	<div class="col-xs-6">
		<button href="{{ base_url() }}pimpinan/laporan/cetak/harian" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Tampilkan</button>
		<a href="{{ base_url() }}pimpinan/laporan/cetak/harian?<?=$_SERVER['QUERY_STRING']?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
	</div>
</div>
</form>
		<table class="table table-hover table-triped">
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Total</th>
				
			</tr>

        <?php
		$no=1;
		$total = 0;
	foreach ($transaksi as $a ) {
		echo" 
		<tr>
			<td>$no</td>
			<td>$a->nama_produk</td>
			<td>$a->jumlah_beli</td>
			<td>$a->harga</td>			
			<td>$a->total</td>	
		</tr>
		";
		$total += $a->total;
		$no++;
	}
	?>
	<tr>
		<td colspan=4 style="text-align:right;">Total</td>
		<td><?=$total?></td>
	</tr>
		</table>
@endsection
