<style>
body{
	font-family: Times New Roman;
}
table {
    border-collapse: collapse;
	margin: 0 auto;
}

table, td, th {
    border: 1px solid black;
}
th {
	background-color: #f0f0f0;
	padding: 13px 5px;
}
td{
	padding: 3px;
}
h1{
	text-align: center;
}
p{
	text-align: center;
}
.ttl{
	width:75%;
}
.ttd{
	width: 25%;
	text-align:center;
	float: right;
}
</style>
<p>
<b>Kelompok Tani dan IKM Agribisnis Kota Solok</b>
</p>
<p>JL.Letnan Jamhur No.45 Aro IV Korong <br/> Kota Solok</p>
<hr/>
<p>
Laporan Produksi Triwulan <br/>
</p>

		<table>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Jumlah</th>
				<th>Waktu</th>
				
				
			</tr>

        <?php
		$no=1;
		
	foreach ($produksi as $a ) {
		echo" 
		<tr>
			<td>$no</td>
			<td>$a->nama_produk</td>
			<td>$a->jumlah</td>			
			<td>$a->waktu</td>			
		</tr>
		";
		
		$no++;
	}
	?>
	
		</table>
<br/>
<div class="ttd">
<p>Solok, <?=date("d-m-Y")?></p><br/>
<br/>
<p>Pimpinan
</p>
</div>
