@extends('template.layout-pimpinan')
@section('judul','Daftar Transaksi')
@section('header','KELOMPOK TANI DAN IKM AGRIBISNIS')
@section('content')
<center><h2>Laporan Penjualan Tahunan</h2></center>
<br/>
<form method="GET" action="">
<div class="row">
	<div class="col-xs-2">
		<label>Pilih tahun</label>
	</div>
	<div class="col-xs-4">
		<select name="tahun" placeholder="pilih tahun" class="form-control">
		<?php foreach($daftar_tahun as $tahun): ?>
			<?php if($_GET['tahun']):  ?>
				<?php if($_GET['tahun'] == date('Y')):  ?>
					<option value="<?=$tahun->tahun?>" selected><?=$tahun->tahun?></option>
				<?php else: ?>
					<option value="<?=$tahun->tahun?>"><?=$tahun->tahun?></option>
				<?php endif; ?>
			<?php else: ?>
				<?php if($tahun->tahun == date('Y')):  ?>
					<option value="<?=$tahun->tahun?>" selected><?=$tahun->tahun?></option>
				<?php else: ?>
					<option value="<?=$tahun->tahun?>"><?=$tahun->tahun?></option>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		</select>
	</div>
	<div class="col-xs-6">
		<button href="{{ base_url() }}pimpinan/laporan/cetak/tahunan" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Tampilkan</button>
		<a href="{{ base_url() }}pimpinan/laporan/cetak/tahunan?<?=$_SERVER['QUERY_STRING']?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
	</div>
</div>
</form>
		<table class="table table-hover tabel-tripped">
			<tr>
				<th>No</th>
				<th>tahun</th>
				<th>Penjualan</th>
				
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
