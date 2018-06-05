<style>
body{
	font-family: Arial;
}
table {
    border-collapse: collapse;
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
</style>
<h2>aakdnak</h2>
<table>
    <tr>
        <th>no</th>

        <th>jenis produk</th>
        <th>stok</th>
    </tr>

<?php

foreach ($produk as $a ) 
$no=1;
echo" 
<tr>
    <td>$no</td>
    <td>$a->nama_produk</td>
    <td>$a->jenis</td>
    <td>$a->stok</td>";
</tr>
";
$no++;    
}
?>
</table>
