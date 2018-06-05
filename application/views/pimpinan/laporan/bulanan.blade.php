@extends('template.layout-pimpinan')
@section('judul','Daftar Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<center><h2>Laporan Penjualan Bulanan</h2></center>
<br/>
<form method="GET" action="">
<div class="row">
	<div class="col-xs-2">
		<label>Pilih bulan</label>
	</div>
	<div class="col-xs-4">
		<select name="bulan" placeholder="pilih bulan" class="form-control">
		<?php foreach($daftar_bulan as $bulan): ?>
			<?php if($_GET['bulan']):  ?>
				<?php if($_GET['bulan'] == date('m')):  ?>
					<option value="<?=$bulan->bulan?>" selected><?=$bulan->nm_bulan?></option>
				<?php else: ?>
					<option value="<?=$bulan->bulan?>"><?=$bulan->nm_bulan?></option>
				<?php endif; ?>
			<?php else: ?>
				<?php if($bulan->bulan == date('m')):  ?>
					<option value="<?=$bulan->bulan?>" selected><?=$bulan->nm_bulan?></option>
				<?php else: ?>
					<option value="<?=$bulan->bulan?>"><?=$bulan->nm_bulan?></option>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		</select>
	</div>
	<div class="col-xs-6">
		<button href="{{ base_url() }}pimpinan/laporan/cetak/bulanan" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Tampilkan</button>
		<a href="{{ base_url() }}pimpinan/laporan/cetak/bulanan?<?=$_SERVER['QUERY_STRING']?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
	</div>
</div>
</form>
		<table class="table table-hover table-tripped">
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Total</th>
				
			</tr>

        <?php
		$no=1;
		$total=0;
	foreach ($transaksi as $a ) {
		echo" 
		<tr>
			<td>$no</td>
			<td>$a->tgl_pembelian</td>		
			<td>$a->total</td>	
		</tr>
		";
		$no++;
		$total += $a->total;
	}
	?>
	<tr>
		<td colspan=2 style="text-align:right;">Total</td>
		<td><?=$total?></td>
	</tr>
		</table>
@endsection
