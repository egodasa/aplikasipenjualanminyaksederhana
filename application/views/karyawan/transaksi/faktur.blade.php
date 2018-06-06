<style>
body{
	font-family: Times New Roman;
}
table {
    border-collapse: collapse;
	margin: 0 auto;
    width: 100%;
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
</style>
<div style="width:75%;float: left;">
    <img src="<?=base_url()."assets/images/bank_indonesia.gif"?>" width="60" height="60" style="float:left;">
    <p style="text-align: center;font-size: 25px;"><b>WUBI</b><br/><span style="font-size: 15px;">WIRAUSAHA BANK INDONESIA</span></p>
</div>
<div style="width:25%;float: right;">
    <p>No Faktur : <?=$detail->id_transaksi?></p>
    <p>Nama Pembeli : <?=$detail->nama_pemesan?></p>
</div>
<div style="clear: both;"></div>
<p style="text-align:left;">GNNT - GERAKAN NASIONAL NON TUNAI</p>
<table>
    <tr>
        <th>No</th>
        <th>Nama produk</th>
        <th>QTY</th>
        <th>Harga</th>
        <th>Jumlah</th>
    </tr>
    <?php $no=1; $harga=0; $beli=0; foreach($produk_beli as $p): ?>
    <tr>
        <td><?=$no?></td>
        <td><?=$p->nama_produk?></td>
        <td><?=$p->jumlah_beli?></td>
        <td><?="Rp ".number_format($p->harga,2,',','.')?></td>
        <td><?="Rp ".number_format($p->harga*$p->jumlah_beli,2,',','.')?></td>
    </tr>
    <?php $harga += $p->harga * $p->jumlah_beli; ?>
    <?php $beli += $p->jumlah_beli; ?>
    <?php $no++; ?>
    <?php endforeach; ?>
    <tr>
        <td colspan=4>Jumlah Bayar</td>
        <td><?="Rp ".number_format($harga,2,',','.')?></td>
    </tr>
</table>
<br/>
<br/>
<br/>
<div style="width:50%; float: left;text-align: center;">
Penerima<br/><br/>...........
</div>
<div style="width:50%; float: right;text-align: center;">
Hormat Kami<br/><br/>...........
</div>
