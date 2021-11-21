<?php
include "koneksi.php";

$nama 		= mysqli_real_escape_string($con, $_POST['nama_barang']);
$jenis 		= mysqli_real_escape_string($con, $_POST['jenis_barang']);
$harga 		= mysqli_real_escape_string($con, $_POST['harga_satuan']);
$jual 		= mysqli_real_escape_string($con, $_POST['harga_jual']);
$merek 		= mysqli_real_escape_string($con, $_POST['merek']);
$stok 		= mysqli_real_escape_string($con, $_POST['stok']);
$total 		= ($harga*$stok);
$date 		= date('Y, m d');

$query = "INSERT INTO pembelian (jenis_barang, harga_beli, stok, harga_jual, total, nama_barang, barang_id, tgl_pembelian) VALUES ('$jenis','$harga','$stok','$jual','$total','$nama','$merek','$date')";
if (mysqli_query($con, $query)) {
 	echo "<script language='JavaScript'>
 	alert('Pembelian Berhasil');
 	document.location = 'Tambah_Barang.php'
 	</script>";
 }else{
		echo "Error: " . $query . "<br/>" . mysqli_error($con);
 }